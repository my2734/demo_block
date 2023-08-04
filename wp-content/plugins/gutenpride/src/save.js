/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import '../node_modules/bootstrap/dist/css/bootstrap.min.css';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @param {Object} props            Properties passed to the function.
 * @param {Object} props.attributes Available block attributes.
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	const redBackground = {
		backgroundColor: "#900",
		color: "#fff",
		padding: '20px',
	}

	const data = [
		{
			"id": 1,
			"content": "https://images.pexels.com/photos/17593738/pexels-photo-17593738/free-photo-of-hom-bukhara.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load"
		},
		{
			"id": 2,
			"content": "https://images.pexels.com/photos/17789334/pexels-photo-17789334/free-photo-of-bi-n-binh-minh-phong-c-nh-hoang-hon.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load"
		},
		{
			"id": 3,
			"content": "https://images.pexels.com/photos/16498785/pexels-photo-16498785/free-photo-of-anh-sang-thanh-ph-dan-ong-nh-ng-ng-i.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load",
		},
		// {
		// 	"id": 4,
		// 	"content": "https://images.pexels.com/photos/17046572/pexels-photo-17046572/free-photo-of-dan-ba-t-ng-d-ng-trang-ph-c.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load"
		// },
		// {
		// 	"id": 5,
		// 	"content": "https://images.pexels.com/photos/17120997/pexels-photo-17120997/free-photo-of-toa-nha-thap-nha-th-ton-giao.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load",
		// }
	]
	const blockProps = useBlockProps.save({ style: redBackground })
	return (
		<div class="image-grid">
			{/* {data.map(p => (
				(p.id==1) ? 
					<img key={p.id} class="image-grid-col-2 image-grid-row-2" src={p.content} alt="architecture" /> : 
					<img key={p.id} src={p.content} alt="architecture" />
				
			))} */}
			{/* <button className="btn btn-primary">Demo button</button> */}
			<button className="btn btn-primary">Demo button12121212</button>
		</div>
	)
}
