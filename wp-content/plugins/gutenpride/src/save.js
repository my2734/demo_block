
import { useBlockProps } from '@wordpress/block-editor';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faChevronLeft, faChevronRight } from '@fortawesome/free-solid-svg-icons'
import { useState } from '@wordpress/element'
export default function save({ attributes }) {
	const blocks = attributes.list_image;
	const blockProps = useBlockProps.save();
	let srcFirstImage = ""
	if (blocks.length > 0) {
		if (blocks[0].file.includes('http')) {
			srcFirstImage = blocks[0].file
		} else {
			srcFirstImage = 'http://localhost/block_demo/wp-content/uploads/' + blocks[0].file
		}
	}

	console.log(srcFirstImage)


	return (
		<div>
			<div className="container mt-4">
				<div className="row py-1" id="coverGallery">
					<div className="col-6" id="colLeft" style={{ overflow: "hidden", height: "auto" }}>
						<div id="mainImage" data-media-path={srcFirstImage} data-bs-toggle="modal" data-bs-target="#exampleModal" className="mediaItem image-item" style={{ height: "100%", backgroundImage: `url('${srcFirstImage}')` }}  >
						</div>
						<div className="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div className="modal-dialog modal-dialog-centered">
								<div className="modal-content bg-transparent" style="border: none">
									<div className="modal-body">
										<div className="coverSlider" style="width: 100%;overflow: hidden;">

											<div className="position-relative" id="mainMediaContent">
												<img class="image-item-main" src={srcFirstImage} alt="" />
											</div>


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
										let customItemCol = "col-6 position-relative custom-padding";
										let customOneImage = "mediaItem image-item"
										if (blocks.length <= 3) {
											if (i == 1) customItemCol = "col-6 position-relative custom-padding col-12";
											if (i == 2) customItemCol = "col-6 position-relative custom-padding col-12";
											if (blocks.length == 2 && i == 1) customOneImage = "mediaItem image-item custom-one-image"
										}
										if (i == 4 && blocks.length > 5) {
											otherImageRight.push(
												<div className={customItemCol}>
													<button class="position-absolute m-auto rounded-1 text-white bg-transparent custom-viewmore" data-bs-toggle="modal" data-bs-target="#modalAllMedia">View more</button>
													<div data-media-path={srcImage} data-bs-toggle="modal" data-bs-target={id_modal2} className={customOneImage} style={{ backgroundImage: "url('" + srcImage + "')" }}  >
													</div>
													<div className="modal fade" id={id_modal1} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div className="modal-dialog modal-dialog-centered">
															<div className="modal-content bg-transparent" style="border: none">
																<div className="modal-body">
																	<div className="coverSlider" style="width: 100%;overflow: hidden;">

																		<div className="position-relative" id="mainMediaContent">
																			<img class="image-item-main" src={srcImage} alt="" />
																		</div>

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
										} else {
											otherImageRight.push(
												<div className={customItemCol}>
													<div data-media-path={srcImage} data-bs-toggle="modal" data-bs-target={id_modal2} className={customOneImage} style={{ backgroundImage: "url('" + srcImage + "')" }}  >
													</div>
													<div className="modal fade" id={id_modal1} tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div className="modal-dialog modal-dialog-centered">
															<div className="modal-content bg-transparent" style="border: none">
																<div className="modal-body">
																	<div className="coverSlider" style="width: 100%;overflow: hidden;">

																		<div className="position-relative" id="mainMediaContent">
																			<img class="image-item-main" src={srcImage} alt="" />
																		</div>


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
										}
										if (i == 4) break;
									}
									return otherImageRight
								})()
							}
						</div>
					</div>
				</div>



				<div className="modal fade" id="modalAllMedia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div className="modal-dialog modal-dialog-centered modal-xl">
						<div className="modal-content bg-transparent" style="border: none">
							<div className="modal-body">
								<div className="coverSlider" style="width: 100%;overflow: hidden;">
									<div className="row" style={{ backgroundColor: "#ffffff", padding: "10px" }}>
										{blocks.map((block) => (
											<div className='col-md-4 col-5' style={{ marginBottom: "25px", height: "300px !important" }}>
												<img style={{ height: "100% !important", width: "100% !important", objectFit: 'cover !important' }} className="image-item-all" src={(block.status && block.status === 'upload') ? block.file : 'http://localhost/block_demo/wp-content/uploads/' + block.file} />
											</div>
										))}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	)
}
