
import { useBlockProps } from '@wordpress/block-editor';
import OtherImage from './saveComponent/OtherImage';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faChevronLeft, faChevronRight } from '@fortawesome/free-solid-svg-icons'
import { useState } from '@wordpress/element'
// import {useState} from 'react'
export default function save({ attributes }) {
	const blocks = attributes.list_image;
	const blockProps = useBlockProps.save();
	// const [srcImageSlider, setSrcImageSlider] = useState("1212121");
	// const [name, setName] = useState('')
	let srcFirstImage = ""
	if (blocks[0].file.includes('http')) {
		srcFirstImage = blocks[0].file
	} else {
		srcFirstImage = 'http://localhost/block_demo/wp-content/uploads/' + blocks[0].file
	}



	return (
		<div>
			<div className="container mt-4">
				<h1>Hello ca nha yeu cua ken</h1>
				<div className="row py-1" id="coverGallery">
					<div className="col-6" id="colLeft" style={{ overflow: "hidden", height: "auto" }}>
						<div id="mainImage" data-media-path={srcFirstImage} data-bs-toggle="modal" data-bs-target="#exampleModal" className="mediaItem image-item" style={{ height: "100%", backgroundImage: `url('${srcFirstImage}')` }}  >
						</div>
						<div className="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div className="modal-dialog modal-dialog-centered">
								<div className="modal-content bg-transparent" style="border: none">
									<div className="modal-body">
										<div className="coverSlider" style="width: 100%;overflow: hidden;">
											<span className="position-absolute custom-previous">
												<FontAwesomeIcon icon={faChevronLeft} />
											</span>
											<div className="position-relative" id="mainMediaContent">
												<img class="image-item-main" src={srcImage} alt="" />
											</div>
											<span className="position-absolute custom-next">
												<FontAwesomeIcon icon={faChevronRight} />
											</span>

											<section id="thumbnail-carousel" className="splide mt-4"
												aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
												<div className="splide__track">
													<ul className="splide__list">
													</ul>
												</div>
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div className="col-6" id="colRight" style={{ overflow: "hidden" }}>
						<div className='row' id='otherImage'>
							{
								(() => {
									let otherImageRight = []
									for (let i = 1; i < blocks.length; i++) {
										let mediaSource = blocks[i];
										let srcImage = ""
										if (mediaSource.file.includes('http')) {
											srcImage = mediaSource.file
										} else {
											srcImage = 'http://localhost/block_demo/wp-content/uploads/' + mediaSource.file
										}
										let id_modal1 = "modal" + i
										let id_modal2 = "#modal" + i
										otherImageRight.push(
											<div className="col-6 position-relative custom-padding">
												<div data-media-path={srcImage} data-bs-toggle="modal" data-bs-target={id_modal2} className="mediaItem image-item" style={{ backgroundImage: "url('" + srcImage + "')" }}  >
												</div>
												<div className="modal fade" id={id_modal1} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div className="modal-dialog modal-dialog-centered">
														<div className="modal-content bg-transparent" style="border: none">
															<div className="modal-body">
																<div className="coverSlider" style="width: 100%;overflow: hidden;">
																	<span className="position-absolute custom-previous">
																		<FontAwesomeIcon icon={faChevronLeft} />
																	</span>
																	<div className="position-relative" id="mainMediaContent">
																		<img class="image-item-main" src={srcImage} alt="" />
																	</div>
																	<span className="position-absolute custom-next">
																		<FontAwesomeIcon icon={faChevronRight} />
																	</span>

																	<section id="thumbnail-carousel" className="splide mt-4"
																		aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
																		<div className="splide__track">
																			<ul className="splide__list">
																			</ul>
																		</div>
																	</section>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										)
										if (i == 4) break;
									}
									return otherImageRight
								})()
							}
						</div>
					</div>
				</div>
				{/* <h1>{srcImageSlider}</h1> */}

				{/* <button type="button" className="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Launch demo modal
				</button> */}

			</div>
		</div>
	)
}
