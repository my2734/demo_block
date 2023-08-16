import { TextControl } from '@wordpress/components';
import { useBlockProps } from '@wordpress/block-editor';
import { ReactSortable } from "react-sortablejs";
import { useSelect } from '@wordpress/data';
import { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCheck, faUpload, faTrash } from '@fortawesome/free-solid-svg-icons'
const sortableOptions = {
	animation: 150,
	fallbackOnBody: true,
	swapThreshold: 0.65,
	ghostClass: "ghost",
	group: "shared",
	forceFallback: true
};



export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();
	const postId = useSelect((select) => select('core/editor').getCurrentPostId());
	const [blocks, setBlocks] = useState([])
	useEffect(() => {
		const fetchPosts = async () => {
			const res = await axios.get('http://localhost/block_demo/wp-json/wp/v2/car/' + postId)
			setBlocks(res.data.list_image)
			// console.log(res.data.list_image.length)
			// console.log(typeof res.data.list_image)
		}
		fetchPosts()
	}, [])
	setAttributes({
		"list_image": blocks
	})

	useEffect(() => {
		setAttributes({
			"list_image": blocks
		})
	}, [blocks])

	// useEffect
	function export_list_image(blocks) {
		let arr_id_image = []
		blocks.forEach(function (block) {
			arr_id_image.push(block.id)
		});
		return arr_id_image
	}

	var mediaUploader = wp.media({
		title: "Choose Images",
		button: {
			text: "Select"
		},
		multiple: true
	});

	mediaUploader.on("select", function () {
		var attachments = mediaUploader.state().get("selection").toJSON();
		var arr_url = [];
		var arr_id_image = [];
		attachments.forEach(function (attachment) {
			arr_url.push({
				id: attachment.id,
				file: attachment.url,
				status: 'upload'
			});
			arr_id_image.push()
		});
		setBlocks(arr_url)
	})
	function handleOpenMedia() {
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}
		mediaUploader.open();
	}

	function handleOnEnd() {
		// console.log('handle on end')
	}

	function handleUpdateMedia() {
		let arr_id_image = []
		blocks.forEach(function (block) {
			arr_id_image.push(block.id)
		});
		const updateMedia = async () => {
			const res = await axios.post('http://localhost/block_demo/wp-json/car/v1/list_image/' + postId, {
				"list_image": arr_id_image
			})
			// setBlocks(res.data.list_image)
			// console.log(res.data)
		}
		updateMedia()
	}

	function handleDeleteImage(id) {
		const resultBlock = blocks.filter(block => block.id != id)
		setBlocks(resultBlock)
	}

	return (
		<div>
			<div>
				{blocks.map((block, index) => (<span style={{ marginLeft: "20px" }}>{block.id}</span>))}
			</div>
			<div className="container">
				<div id="content_image">
					<ReactSortable onEnd={handleOnEnd} className='row mt-5' list={blocks} setList={setBlocks} {...sortableOptions}>
						{blocks.map((block, blockIndex) => (
							<div className="col-md-3 mt-5" >
								<div style={{ height: "200px" }} className='coverImage'>
									<img style={{ height: "100%", width: "100%", objectFit: "cover" }} src={(block.status && block.status === 'upload') ? block.file : 'http://localhost/block_demo/wp-content/uploads/' + block.file} />
									<div onClick={() => handleDeleteImage(block.id)} class="coverIcon">
										<FontAwesomeIcon icon={faTrash} />
									</div>
								</div>
							</div>
						))}
					</ReactSortable>
					<div className='d-flex justify-content-center align-content-center'>
						<div className="mt-5 d-flex">
							<div onClick={handleOpenMedia} className="coverIconUpload">
								<div className="circleIcon">
									<FontAwesomeIcon icon={faUpload} />
								</div>
							</div>
							<div onClick={handleUpdateMedia} className="coverIconUpload">
								<div className="circleIcon">
									<FontAwesomeIcon icon={faCheck} />
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	);
}
