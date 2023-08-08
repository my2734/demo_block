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
	const blockProps = useBlockProps.save()
	return (
		<>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div style={{ height: "200px" }}>
							<img style={{ height: "100%", width: "100%", objectFit: "cover" }} src="https://images.pexels.com/photos/17760623/pexels-photo-17760623/free-photo-of-thanh-ph-toa-nha-van-phong-ki-n-truc.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load" />
						</div>
					</div>
					<div class="col-md-3">
						<div style={{ height: "200px" }}>
							<img style={{ height: "100%", width: "100%", objectFit: "cover" }} src="https://images.pexels.com/photos/17760623/pexels-photo-17760623/free-photo-of-thanh-ph-toa-nha-van-phong-ki-n-truc.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load" />
						</div>
					</div>
					<div class="col-md-3">
						<div style={{ height: "200px" }}>
							<img style={{ height: "100%", width: "100%", objectFit: "cover" }} src="https://images.pexels.com/photos/17760623/pexels-photo-17760623/free-photo-of-thanh-ph-toa-nha-van-phong-ki-n-truc.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load" />
						</div>
					</div>
				</div>
			</div>
		</>
	)
}
