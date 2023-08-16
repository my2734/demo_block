<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
    integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
<style>
    .image-item-main {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .custom-padding {
        padding: 4px !important;
    }

    .custom-viewmore {
        top: 45%;
        right: 33%;
        border: 1px solid #fff;
    }

    .custom-previous {
        top: 45%;
        left: -6%;
        color: #000;
        padding: 4px 9px;
        background: #d0d0d0;
        border-radius: 5px;
    }

    .custom-next {
        top: 45%;
        right: -6%;
        color: #000;
        padding: 4px 9px;
        background: #d0d0d0;
        border-radius: 5px;
    }

    .mainMediaContent i {
        font-size: 20px;
        font-weight: 500;
    }

    .custom-size-image {
        width: 120px;
        height: 100px;
        padding-right: 0px;
    }

    .mediaItem {
        /* padding: 4px; */
        background-position: center;
        background-size: cover;
    }

    #colLeft {
        padding: 4px;
    }

    .custom-one-image {
        height: 530px !important;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .custom-viewmore {
            font-size: 10px;
        }

        #mainMediaContent {
            height: 132px;
        }

        .custom-previous {
            top: 24%;
            left: -16%;
        }

        .custom-next {
            top: 24%;
            right: -16%;
        }

        .custom-size-image {
            width: 60px;
            height: 40px;

        }

        .mediaItem {
            height: 100px;

        }

        /* #coverGallery {
            background-color: pink;
        } */

        .custom-one-image {
            height: 220px !important;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        #mainMediaContent {
            height: 132px;
        }

        .mediaItem {
            height: 111px;
        }

        /* #coverGallery {
            background-color: black;
        } */

        .custom-one-image {
            height: 262px !important;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        #mainMediaContent {
            height: 270px;
        }

        .mediaItem {
            height: 156px;
        }

        /* #coverGallery {
            background-color: yellow;
        } */

        .custom-one-image {
            height: 352px !important;
        }

        #mainMediaContent #video {
            top: 26%;
            position: absolute;
        }

        #mainMediaContent {
            margin-bottom: 50px;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        #mainMediaContent {
            height: 410px;
        }

        .mediaItem {
            height: 216px;
        }

        /* #coverGallery {
            background-color: blue;
        } */

        .custom-one-image {
            height: 472px !important;
        }

        #mainMediaContent #video {
            top: 26%;
            position: absolute;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        /* #mainImage {
                    height: 536px;
                } */

        .mediaItem {
            height: 261px;
            padding: 4px;
        }

        /* #coverGallery {
            background-color: red;
        } */

        #mainMediaContent #video {
            top: 26%;
            position: absolute;
        }
    }

    /* slider js */
    .modal {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .splide__slide img {
        width: 100%;
        height: auto;
    }

    .splide__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .splide__slide {
        opacity: 0.7;
        position: relative;
    }

    .splide__slide.is-active {
        opacity: 1;
    }
</style>
</head>

<body>

    <div class="container mt-4">
        <div class="row py-1" id="coverGallery">
            <div class="col-6" id="colLeft" style="overflow: hidden;height: auto;">
                <!-- <div class="" style="height: 100%;">
                    <img class="image-item-main image-item" data-bs-toggle="modal" order_media="0"
                        data-bs-target="#exampleModal" src="" alt="" id="mainImage">
                </div> -->
                <div id="mainImage" class="mediaItem image-item"
                    style="height: 100%;">
                </div>
            </div>
            <div class="col-6" id="colRight" style="overflow: hidden;">
                <div class="row" id="otherImages">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent" style="border: none">
                    <div class="modal-body">
                        <div class="coverSlider" style="width: 100%;overflow: hidden;">
                            <span class="position-absolute custom-previous"><i
                                    class="bi bi-chevron-left text-dark"></i></span>
                            <div class="position-relative" id="mainMediaContent">

                            </div>
                            <span class="position-absolute custom-next"><i
                                    class="bi bi-chevron-right text-dark"></i></span>

                            <section id="thumbnail-carousel" class="splide mt-4"
                                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- <iframe src="https://www.glo3d.net/iFrame/mEpDcSvVKW" allowfullscreen="true" loading="lazy" width="100%"
            height="100%" frameborder="0" scrolling="no"></iframe> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script>
        const mediaSources = [
            {
                'id': 4,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/16955442/pexels-photo-16955442/free-photo-of-tr-ng-bay-da-hoa-vi-n-b-o-tang-tri-n-lam.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
            },
            {
                'id': 3,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/17715610/pexels-photo-17715610/free-photo-of-ngh-thu-t-toa-nha-ki-n-truc-l-ch-s.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
            },
            {
                'id': 1,
                'type': 'image-360deg',
                'path': 'https://us-central1-glo3d-c338b.cloudfunctions.net/thumb/mEpDcSvVKW',
                'iframe': '<iframe allowfullscreen="true" loading="lazy" src="https://www.glo3d.net/iFrame/mEpDcSvVKW" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>',
            },
            {
                'id': 2,
                'type': 'video',
                'path': 'https://images.pexels.com/photos/17884240/pexels-photo-17884240/free-photo-of-dan-ong-nh-ng-ng-i-cong-nghi-p-kinh-doanh.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
                'mp4': 'http://media.w3.org/2010/05/sintel/trailer.mp4'
            },
            {
                'id': 5,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/17921251/pexels-photo-17921251.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
            },
            {
                'id': 6,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/15537703/pexels-photo-15537703/free-photo-of-d-b-n-toa-nha-xay-d-ng-m-u.jpeg?auto=compress&cs=tinysrgb&w=800&lazy=load',
            },
            {
                'id': 7,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/17830406/pexels-photo-17830406/free-photo-of-th-i-trang-yeu-nh-ng-ng-i-dan-ba.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
            },
            {
                'id': 8,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/9336369/pexels-photo-9336369.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
            },
            {
                'id': 9,
                'type': 'image',
                'path': 'https://images.pexels.com/photos/12532790/pexels-photo-12532790.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
            },
        ];

        jQuery(document).ready(function () {
            const mainImage = $("#mainImage");
            //handle attr main image
            const otherImagesContainer = $("#otherImages");
            mainImage.attr({
                "data-media-type": mediaSources[0].type,
                "data-media-iframe": mediaSources[0].iframe ? mediaSources[0].iframe : "",
                "order_media": 0,
                "data-bs-toggle": "modal",
                "data-bs-target": "#exampleModal",
                "src": mediaSources[0].path
            }).css({
                "backgroundImage": 'url(' + mediaSources[0].path + ')',
            })
            let heightItem = 0;
            if (mediaSources.length > 0) {
                // mainImage.attr("src", mediaSources[0].path);?
                for (let i = 1; i < mediaSources.length; i++) {
                    const mediaSource = mediaSources[i];
                    const mediaItem = $("<div>").addClass("col-6 position-relative custom-padding");
                    //handle last image
                    if (i == 4 && mediaSources.length > 5) {
                        mediaItem.addClass('opacity-50')
                        mediaItem.append('<button class="position-absolute m-auto rounded-1 text-white bg-transparent custom-viewmore" data-bs-toggle="modal" data-bs-target="#exampleModal">View more</button>')
                    }
                    if (mediaSources.length <= 3) {
                        if (i == 1) mediaItem.addClass('col-12')
                        if (i == 2) mediaItem.addClass('col-12')
                        if (mediaSources.length == 3) mediaItem.addClass('col-12')
                    }
                    let mediaImage = $("<div>").addClass("mediaItem image-item").css({
                        "backgroundImage": 'url(' + mediaSource.path + ')',
                    }).attr({
                        "data-bs-toggle": "modal",
                        "data-bs-target": "#exampleModal",
                        "order_media": i,
                        "src": mediaSource.path,
                        "data-media-type": mediaSource.type,
                        "data-media-iframe": mediaSource.iframe ? mediaSource.iframe : "",
                        "data-media-mp4": mediaSource.mp4 ? mediaSource.mp4 : "",
                        "data-media-path": mediaSource.path,
                    });
                    if (mediaSources.length == 2 && i == 1) mediaImage.addClass('custom-one-image')
                    mediaItem.append(mediaImage);
                    otherImagesContainer.append(mediaItem);
                    heightItem = mediaItem.css('height').split('px')[0]
                    if (i == 4) break;
                }
            }


            $('.image-item').click(function () {
                const type = $(this).data('media-type')
                const order_media = $(this).attr('order_media')
                const mainMediaContent = $('#mainMediaContent').html('');
                mainMediaContent.attr('order_media', order_media)
                if (type == "image-360deg") {
                    mainMediaContent.append($(this).data('media-iframe'))
                } else if (type == "video") {
                    mainMediaContent.append(`
                    <video id='video' controls="controls" preload='none' width="100%">
                        <source id='mp4' src="${$(this).data('media-mp4')}"
                            type='video/mp4' />
                    </video>
                    `)
                } else {
                    const src = $(this).attr('src')
                    // console.log($(this));
                    mainMediaContent.append('<img class="image-item-main" src="' + src + '" alt="">')
                }
            })

            // handler data in sliderJS
            const splide__list = $('.splide__list')
            for (let i = 0; i < mediaSources.length; i++) {
                const mediaSource = mediaSources[i];
                const splide__slide_item = $("<li>").addClass("splide__slide").attr({
                    'path_image': mediaSource.path,
                    "order_media": i,
                    "src": mediaSource.path,
                    "data-media-type": mediaSource.type,
                    "data-media-iframe": mediaSource.iframe ? mediaSource.iframe : "",
                    "data-media-mp4": mediaSource.mp4 ? mediaSource.mp4 : "",
                    "data-media-path": mediaSource.path,
                });
                const splide__slide_item_image = $("<img>").attr('src', mediaSource.path);
                splide__slide_item.append(splide__slide_item_image)
                splide__list.append(splide__slide_item)
            }
            new Splide('#thumbnail-carousel', {
                fixedWidth: 100,
                fixedHeight: 60,
                gap: 10,
                rewind: true,
                pagination: false,
                breakpoints: {
                    600: {
                        fixedWidth: 60,
                        fixedHeight: 44,
                    },
                },
            }).mount();

            $('.splide__arrows').remove();



            $('.splide__slide').click(function () {
                const list_splide_slide = $('.splide__slide');
                for (let i = 0; i < list_splide_slide.length; i++) {
                    $(list_splide_slide[i]).removeClass('is-active')
                }
                $(this).addClass('is-active')
                const type = $(this).data('media-type')
                const order_media = $(this).attr('order_media')
                const mainMediaContent = $('#mainMediaContent').html('');
                mainMediaContent.attr('order_media', order_media)
                if (type == "image-360deg") {
                    mainMediaContent.append($(this).data('media-iframe'))
                } else if (type == "video") {
                    mainMediaContent.append(`
                    <video id='video' controls="controls" preload='none' width="100%"
                        >
                        <source id='mp4' src="${$(this).data('media-mp4')}"
                            type='video/mp4' />
                    </video>
                    `)
                } else {
                    const src = $(this).attr('src')
                    mainMediaContent.append('<img class="image-item-main" src="' + src + '" alt="">')
                }
            })


            // handler button previous and next
            $('.custom-previous').click(function () {
                let order_media_current = $('#mainMediaContent').attr('order_media') - 0;
                if (order_media_current == 0) order_media_current = mediaSources.length;
                let order_media_previous = order_media_current - 1;
                const mediaSource = mediaSources[order_media_previous];

                const type = mediaSource.type
                const order_media = order_media_previous
                const mainMediaContent = $('#mainMediaContent').html('');
                mainMediaContent.attr('order_media', order_media)
                if (type == "image-360deg") {
                    mainMediaContent.append(mediaSource.iframe)
                } else if (type == "video") {
                    mainMediaContent.append(`
                    <video id='video' controls="controls" preload='none' width="100%"
                        >
                        <source id='mp4' src="${mediaSource.mp4}"
                            type='video/mp4' />
                    </video>
                    `)
                } else {
                    const src = mediaSource.path
                    mainMediaContent.append('<img class="image-item-main" src="' + src + '" alt="">')
                }

                const list_splide_slide = $('.splide__slide');
                for (let i = 0; i < list_splide_slide.length; i++) {
                    $(list_splide_slide[i]).removeClass('is-active')
                }
                $($('.splide__slide')[order_media_previous]).addClass('is-active')
            })

            $('.custom-next').click(function () {
                let order_media_current = $('#mainMediaContent').attr('order_media') - 0;
                if (order_media_current == mediaSources.length - 1) order_media_current = -1;
                let order_media_next = order_media_current + 1;
                const mediaSource = mediaSources[order_media_next];

                const type = mediaSource.type
                const order_media = order_media_next
                const mainMediaContent = $('#mainMediaContent').html('');
                mainMediaContent.attr('order_media', order_media)
                if (type == "image-360deg") {
                    mainMediaContent.append(mediaSource.iframe)
                } else if (type == "video") {
                    mainMediaContent.append(`
                    <video id='video' controls="controls" preload='none' width="100%">
                        <source id='mp4' src="${mediaSource.mp4}"
                            type='video/mp4' />
                    </video>
                    `)
                } else {
                    const src = mediaSource.path
                    mainMediaContent.append('<img class="image-item-main" src="' + src + '" alt="">')
                }

                const list_splide_slide = $('.splide__slide');
                for (let i = 0; i < list_splide_slide.length; i++) {
                    $(list_splide_slide[i]).removeClass('is-active')
                }
                $($('.splide__slide')[order_media_next]).addClass('is-active')
            })
        })
    </script>