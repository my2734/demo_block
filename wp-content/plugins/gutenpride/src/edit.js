import { TextControl } from '@wordpress/components';
import { useBlockProps } from '@wordpress/block-editor';
import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { ReactSortable } from "react-sortablejs";
import axios from 'axios'
import { useSelect } from '@wordpress/data';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faTrash, faUpload, faCheck, faLeftLong } from '@fortawesome/free-solid-svg-icons'
import { Audio, Oval } from 'react-loader-spinner'
import './editor.scss'
const sortableOptions = {
	animation: 150,
	fallbackOnBody: true,
	swapThreshold: 0.65,
	ghostClass: "ghost",
	group: "shared",
	forceFallback: true
};
export default function Edit({ attributes, setAttributes }) {
	const postId = useSelect((select) => select('core/editor').getCurrentPostId());
	let [loading, setLoading] = useState(false);
	let [loadingCSS, setLoadingCSS] = useState("none");
	const [blocks, setBlocks] = useState([])
	useEffect(() => {
		const fetchPosts = async () => {
			const res = await axios.get('http://localhost/block_demo/wp-json/wp/v2/car/' + postId)
			setBlocks(res.data.list_image)
		}
		fetchPosts()
	}, [])

	useEffect(() => {
		const list_image = []
		blocks.forEach(block => {
			list_image.push(block)
		})
		setAttributes({
			"list_image": list_image
		})

	}, [blocks])
	function handleUpdate() {
		const list_image = [];
		blocks.forEach(block => {
			list_image.push(block.id);
		});
		const updateMedia = async () => {
			const res = await axios.post('http://localhost/block_demo/wp-json/car/v1/list_image/' + postId, {
				"list_image": list_image
			})
		}
		updateMedia()
		setLoading(true)
		setLoadingCSS('flex')
		setTimeout(()=>{
			setLoading(false)
			setLoadingCSS('none')
		},2000)
	}

	function handleOnEnd() {
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
		const list_image = []
		blocks.forEach(block => {
			list_image.push(block)
		})
		setAttributes({
			"list_image": list_image
		})

	})
	function handleOpenMedia() {
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}
		mediaUploader.open();
	}

	function handleDelete(id) {
		const newBlocks = blocks.filter(block => block.id != id)
		setBlocks(newBlocks)
	}


	return (
		<div>
			<div className="container">
				<div id="content_image">
					<ReactSortable onEnd={handleOnEnd} className='row mt-5' list={blocks} setList={setBlocks} {...sortableOptions}>
						{blocks.map((block, blockIndex) => (
							<div className="col-md-3 mt-4" >
								<div style={{ height: "200px" }} className="coverImage">
									<img style={{ height: "100%", width: "100%", objectFit: "cover" }} className="itemImage"
										src={(block.status && block.status === 'upload') ? block.file : 'http://localhost/block_demo/wp-content/uploads/' + block.file} />
									<div onClick={() => handleDelete(block.id)} className="coverIcon">
										<FontAwesomeIcon icon={faTrash} />
									</div>
								</div>
							</div>
						))}
					</ReactSortable>
					{/* </div> */}

				</div>
				<div className='d-flex justify-content-center align-items-center mt-5'>
					<div class="circleIcon" onClick={handleOpenMedia}>
						<FontAwesomeIcon icon={faUpload} />
					</div>
					<div class="circleIcon" onClick={handleUpdate} style={{ marginLeft: "20px" }}>
						<FontAwesomeIcon icon={faCheck} />
					</div>
				</div>
			</div>
			<div id='loading-modal' style={{ display: loadingCSS}} className="justify-content-center align-items-center">
				<Oval
					height={60}
					width={60}
					color="#ffffff"
					wrapperStyle={{}}
					wrapperClass=""
					visible={loading}
					ariaLabel='oval-loading'
					secondaryColor="#ffffff"
					strokeWidth={2}
					strokeWidthSecondary={2}

				/>
			</div>
		</div>
	)
}
