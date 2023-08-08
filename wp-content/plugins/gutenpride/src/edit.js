/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { TextControl } from '@wordpress/components';
import {addAction,doAction} from '@wordpress/hooks';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { ReactSortable } from "react-sortablejs";
import axios from 'axios'
//  { getCurrentPostId } = wp.data.select("core/editor")
import { useSelect } from '@wordpress/data';
/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @param {Object}   props               Properties passed to the function.
 * @param {Object}   props.attributes    Available block attributes.
 * @param {Function} props.setAttributes Function that updates individual attributes.
 *
 * @return {WPElement} Element to render.
 */


const sortableOptions = {
	animation: 150,
	fallbackOnBody: true,
	swapThreshold: 0.65,
	ghostClass: "ghost",
	group: "shared",
	forceFallback: true
};

export default function Edit(props) {

	addAction('init', 'my_custom_function', (arg1, arg2) => {
		console.log('Action triggered with args:', arg1, arg2);
	});
	
	// Kích hoạt action 'init'
	// doAction('init', 'Hello', 'World');


	const postId = useSelect((select) => select('core/editor').getCurrentPostId());

	const [blocks, setBlocks] = useState([])
	useEffect(() => {
		const fetchPosts = async () => {
			const res = await axios.get('http://localhost/block_demo/wp-json/wp/v2/car/' + postId)
			setBlocks(res.data.list_image)
		}
		fetchPosts()
	}, [])
	function handleUpdate() {
		console.log("handler update")
	}

	function handleOnEnd(){
		//send axios update post_meta by post_id
		// let arr_result = [];
		// blocks.forEach((block)=>{
		// 	arr_result.push(block.id)
		// });
		// // console.log(arr_result)
		// const updateListImage = async () => {
		// 	const res = await axios.post('http://localhost/block_demo/wp-json/car/v1/list_image/' + postId,{
		// 		list_image: arr_result,
		// 	  })
		// 	// setBlocks(res.data.list_image)
		// 	console.log(res.data)
		// }
		// updateListImage()
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
	return (
		<div>
			<div>
				{/* {blocks.map((block, index) => (<h1>{block.id}</h1>))} */}
				{blocks.map((block,index)=>(<h1>{block.id}</h1>))}
			</div>
			<div className="container">
				<div id="content_image">
					<ReactSortable onEnd={handleOnEnd} className='row mt-5' list={blocks} setList={setBlocks} {...sortableOptions}>
						{blocks.map((block, blockIndex) => (
							<div className="col-md-3 mt-5" >
								<div style={{ height: "200px" }}>
									<img style={{ height: "100%", width: "100%", objectFit: "cover" }} src={(block.status && block.status === 'upload') ? block.file : 'http://localhost/block_demo/wp-content/uploads/' + block.file} />
								</div>
							</div>
						))}
					</ReactSortable>
					{/* </div> */}
				</div>
				<div className="text-center mt-5">
					<button onClick={handleOpenMedia} className="btn btn-primary">Upload image</button>
				</div>
				{/* <div className="text-center mt-5">
					<button onClick={handleUpdate} className="btn btn-primary">Update image</button>
				</div> */}

			</div>
		</div>
	)
}
