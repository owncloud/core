/*
    ImageViewer v 1.1.1
    Author: Sudhanshu Yadav
    Copyright (c) 2015-2016 to Sudhanshu Yadav - ignitersworld.com , released under the MIT license.
    Demo on: http://ignitersworld.com/lab/imageViewer.html
*/

/*** picture view plugin ****/
(function ($, window, document, undefined) {
    "use strict";

    //an empty function
    var noop = function () {};

    var $body,
        $window,
        $document;

    //constants
    var ZOOM_CONSTANT = 15; //increase or decrease value for zoom on mouse wheel
    var MOUSE_WHEEL_COUNT = 5; //A mouse delta after which it should stop preventing default behaviour of mouse wheel

    //ease out method
    /*
        t : current time,
        b : intial value,
        c : changed value,
        d : duration
    */
    function easeOutQuart(t, b, c, d) {
        t /= d;
        t--;
        return -c * (t * t * t * t - 1) + b;
    };


    // http://paulirish.com/2011/requestanimationframe-for-smart-animating/
    // http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating

    // requestAnimationFrame polyfill by Erik Möller
    // fixes from Paul Irish and Tino Zijdel

    (function () {
        var lastTime = 0;
        var vendors = ['ms', 'moz', 'webkit', 'o'];
        for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
            window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
            window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
        }

        if (!window.requestAnimationFrame)
            window.requestAnimationFrame = function (callback, element) {
                var currTime = new Date().getTime();
                var timeToCall = Math.max(0, 16 - (currTime - lastTime));
                var id = window.setTimeout(function () {
                        callback(currTime + timeToCall);
                    },
                    timeToCall);
                lastTime = currTime + timeToCall;
                return id;
            };

        if (!window.cancelAnimationFrame)
            window.cancelAnimationFrame = function (id) {
                clearTimeout(id);
            };
    }());

    //function to check if image is loaded
    function imageLoaded(img) {
        return img.complete && (typeof img.naturalWidth === 'undefined' || img.naturalWidth !== 0);
    }

    var imageViewHtml = '<div class="iv-loader"></div> <div class="iv-snap-view">' + '<div class="iv-snap-image-wrap">' + '<div class="iv-snap-handle"></div>' + '</div>' + '<div class="iv-zoom-slider"><div class="iv-zoom-handle"></div></div></div>' + '<div class="iv-image-view" ><div class="iv-image-wrap" ></div></div>';

    //add a full screen view
    $(function () {
        $body = $('body');
        $window = $(window);
        $document = $(document);

        $body.append('<div id="iv-container">' + imageViewHtml + '<div class="iv-close"></div><div>');
    });

    function Slider(container, options) {
        this.container = container;
        this.onStart = options.onStart || noop;
        this.onMove = options.onMove || noop;
        this.onEnd = options.onEnd || noop;
        this.sliderId = options.sliderId || 'slider' + Math.ceil(Math.random() * 1000000);
    }

    Slider.prototype.init = function () {
        var self = this,
            container = this.container,
            eventSuffix = '.' + this.sliderId;

        //assign event on snap image wrap
        this.container.on('touchstart' + eventSuffix + ' mousedown' + eventSuffix, function (estart) {
          estart.preventDefault();
            var touchMove = (estart.type == "touchstart" ? "touchmove" : "mousemove") + eventSuffix,
                touchEnd = (estart.type == "touchstart" ? "touchend" : "mouseup") + eventSuffix,
                eOrginal = estart.originalEvent,
                sx = eOrginal.clientX || eOrginal.touches[0].clientX,
                sy = eOrginal.clientY || eOrginal.touches[0].clientY;

            var start = self.onStart(estart, {
                x: sx,
                y: sy
            });

            if (start === false) return;

            var moveListener = function (emove) {
                emove.preventDefault();

                eOrginal = emove.originalEvent;

                //get the cordinates
                var mx = eOrginal.clientX || eOrginal.touches[0].clientX,
                    my = eOrginal.clientY || eOrginal.touches[0].clientY;

                self.onMove(emove, {
                    dx: mx - sx,
                    dy: my - sy,
                    mx: mx,
                    my: my
                });

            };

            var endListener = function () {
                $document.off(touchMove, moveListener);
                $document.off(touchEnd, endListener);
                self.onEnd();
            };

            $document.on(touchMove, moveListener);
            $document.on(touchEnd, endListener);
        });

        return this;
    }


    function ImageViewer(container, options) {
        var self = this;

        if (container.is('#iv-container')) {
            self._fullPage = true;
        }

        self.container = container;
        options = self.options = $.extend({}, ImageViewer.defaults, options);

        self.zoomValue = 100;

        if (!container.find('.snap-view').length) {
            container.prepend(imageViewHtml);
        }

        container.addClass('iv-container');

        if (container.css('position') == 'static') container.css('position', 'relative');

        self.snapView = container.find('.iv-snap-view');
        self.snapImageWrap = container.find('.iv-snap-image-wrap');
        self.imageWrap = container.find('.iv-image-wrap');
        self.snapHandle = container.find('.iv-snap-handle');
        self.zoomHandle = container.find('.iv-zoom-handle');
        self._viewerId = 'iv' + Math.floor(Math.random() * 1000000);
    }


    ImageViewer.prototype = {
        constructor: ImageViewer,
        _init: function () {
            var viewer = this,
                options = viewer.options,
                zooming = false, // tell weather we are zooming trough touch
                container = this.container;

            var eventSuffix = '.' + viewer._viewerId;

            //cache dom refrence
            var snapHandle = this.snapHandle;
            var snapImgWrap = this.snapImageWrap;
            var imageWrap = this.imageWrap;

            var snapSlider = new Slider(snapImgWrap, {
                sliderId: viewer._viewerId,
                onStart: function () {

                    if (!viewer.loaded) return false;

                    var handleStyle = snapHandle[0].style;

                    this.curHandleTop = parseFloat(handleStyle.top);
                    this.curHandleLeft = parseFloat(handleStyle.left);
                    this.handleWidth = parseFloat(handleStyle.width);
                    this.handleHeight = parseFloat(handleStyle.height);
                    this.width = snapImgWrap.width();
                    this.height = snapImgWrap.height();

                    //stop momentum on image
                    clearInterval(imageSlider.slideMomentumCheck);
                    cancelAnimationFrame(imageSlider.sliderMomentumFrame);
                },
                onMove: function (e, position) {
                    var xPerc = this.curHandleLeft + position.dx * 100 / this.width,
                        yPerc = this.curHandleTop + position.dy * 100 / this.height;

                    xPerc = Math.max(0, xPerc);
                    xPerc = Math.min(100 - this.handleWidth, xPerc);

                    yPerc = Math.max(0, yPerc);
                    yPerc = Math.min(100 - this.handleHeight, yPerc);


                    var containerDim = viewer.containerDim,
                        imgWidth = viewer.imageDim.w * (viewer.zoomValue / 100),
                        imgHeight = viewer.imageDim.h * (viewer.zoomValue / 100),
                        imgLeft = imgWidth < containerDim.w ? (containerDim.w - imgWidth) / 2 : -imgWidth * xPerc / 100,
                        imgTop = imgHeight < containerDim.h ? (containerDim.h - imgHeight) / 2 : -imgHeight * yPerc / 100;

                    snapHandle.css({
                        top: yPerc + '%',
                        left: xPerc + '%'
                    })

                    viewer.currentImg.css({
                        left: imgLeft,
                        top: imgTop
                    })
                }
            }).init();


            /*Add slide interaction to image*/
            var imageSlider = viewer._imageSlider = new Slider(imageWrap, {
                sliderId: viewer._viewerId,
                onStart: function (e, position) {
                    if (!viewer.loaded) return false;
                    if (zooming) return;
                    var self = this;
                    snapSlider.onStart();
                    self.imgWidth = viewer.imageDim.w * viewer.zoomValue / 100;
                    self.imgHeight = viewer.imageDim.h * viewer.zoomValue / 100;

                    self.positions = [position, position];

                    self.startPosition = position;

                    //clear all animation frame and interval
                    viewer._clearFrames();

                    self.slideMomentumCheck = setInterval(function () {
                        if (!self.currentPos) return;
                        self.positions.shift();
                        self.positions.push({
                            x: self.currentPos.mx,
                            y: self.currentPos.my
                        })
                    }, 50);
                },
                onMove: function (e, position) {
                    if (zooming) return;
                    this.currentPos = position;

                    snapSlider.onMove(e, {
                        dx: -position.dx * snapSlider.width / this.imgWidth,
                        dy: -position.dy * snapSlider.height / this.imgHeight
                    });
                },
                onEnd: function () {
                    if (zooming) return;
                    var self = this;

                    var xDiff = this.positions[1].x - this.positions[0].x,
                        yDiff = this.positions[1].y - this.positions[0].y;

                    function momentum() {
                        if (step <= 60) {
                            self.sliderMomentumFrame = requestAnimationFrame(momentum);
                        }

                        positionX = positionX + easeOutQuart(step, xDiff / 3, -xDiff / 3, 60);
                        positionY = positionY + easeOutQuart(step, yDiff / 3, -yDiff / 3, 60)


                        snapSlider.onMove(null, {
                            dx: -((positionX) * snapSlider.width / self.imgWidth),
                            dy: -((positionY) * snapSlider.height / self.imgHeight)
                        });
                        step++;
                    }

                    if (Math.abs(xDiff) > 30 || Math.abs(yDiff) > 30) {
                        var step = 1,
                            positionX = self.currentPos.dx,
                            positionY = self.currentPos.dy;

                        momentum();
                    }
                }
            }).init();


            /*Add zoom interation in mouse wheel*/
            var changedDelta = 0;
            imageWrap.on("mousewheel" + eventSuffix + " DOMMouseScroll" + eventSuffix, function (e) {
                if(!options.zoomOnMouseWheel) return;

                if (!viewer.loaded) return;


                //clear all animation frame and interval
                viewer._clearFrames();

                // cross-browser wheel delta
                var delta = Math.max(-1, Math.min(1, (e.originalEvent.wheelDelta || -e.originalEvent.detail))),
                    zoomValue = viewer.zoomValue * (100 + delta * ZOOM_CONSTANT) / 100;

                if(!(zoomValue >= 100 && zoomValue <= options.maxZoom)){
                    changedDelta += Math.abs(delta);
                }
                else{
                    changedDelta = 0;
                }

                if(changedDelta > MOUSE_WHEEL_COUNT) return;

                e.preventDefault();

                var contOffset = container.offset(),
                    x = (e.pageX || e.originalEvent.pageX) - contOffset.left,
                    y = (e.pageY || e.originalEvent.pageY) - contOffset.top;



                viewer.zoom(zoomValue, {
                    x: x,
                    y: y
                });

                //show the snap viewer
                showSnapView();
            });


            //apply pinch and zoom feature
            imageWrap.on('touchstart' + eventSuffix, function (estart) {
                if (!viewer.loaded) return;
                var touch0 = estart.originalEvent.touches[0],
                    touch1 = estart.originalEvent.touches[1];

                if (!(touch0 && touch1)) {
                    return;
                }


                zooming = true;

                var contOffset = container.offset();

                var startdist = Math.sqrt(Math.pow(touch1.pageX - touch0.pageX, 2) + Math.pow(touch1.pageY - touch0.pageY, 2)),
                    startZoom = viewer.zoomValue,
                    center = {
                        x: ((touch1.pageX + touch0.pageX) / 2) - contOffset.left,
                        y: ((touch1.pageY + touch0.pageY) / 2) - contOffset.top
                    }

                var moveListener = function (emove) {
                    emove.preventDefault();

                    var touch0 = emove.originalEvent.touches[0],
                        touch1 = emove.originalEvent.touches[1],
                        newDist = Math.sqrt(Math.pow(touch1.pageX - touch0.pageX, 2) + Math.pow(touch1.pageY - touch0.pageY, 2)),
                        zoomValue = startZoom + (newDist - startdist) / 2;

                    viewer.zoom(zoomValue, center);
                };

                var endListener = function () {
                    $document.off('touchmove', moveListener);
                    $document.off('touchend', endListener);
                    zooming = false;
                };

                $document.on('touchmove', moveListener);
                $document.on('touchend', endListener);

            });


            //handle double tap for zoom in and zoom out
            var touchtime = 0,
                point;
            imageWrap.on('click' + eventSuffix, function (e) {
                if (touchtime == 0) {
                    touchtime = Date.now();
                    point = {
                        x: e.pageX,
                        y: e.pageY
                    };
                } else {
                    if ((Date.now() - touchtime) < 500 && Math.abs(e.pageX - point.x) < 50 && Math.abs(e.pageY - point.y) < 50) {
                        if (viewer.zoomValue == options.zoomValue) {
                            viewer.zoom(200)
                        } else {
                            viewer.resetZoom()
                        }
                        touchtime = 0;
                    } else {
                        touchtime = 0;
                    }
                }
            });

            //zoom in zoom out using zoom handle
            var slider = viewer.snapView.find('.iv-zoom-slider');
            var zoomSlider = new Slider(slider, {
                sliderId: viewer._viewerId,
                onStart: function (eStart) {

                    if (!viewer.loaded) return false;

                    this.leftOffset = slider.offset().left;
                    this.handleWidth = viewer.zoomHandle.width();
                    this.onMove(eStart);

                },
                onMove: function (e, position) {
                    var newLeft = (e.pageX || e.originalEvent.touches[0].pageX) - this.leftOffset - this.handleWidth / 2;

                    newLeft = Math.max(0, newLeft);
                    newLeft = Math.min(viewer._zoomSliderLength, newLeft);

                    var zoomValue = 100 + (options.maxZoom - 100) * newLeft / viewer._zoomSliderLength;

                    viewer.zoom(zoomValue);
                }
            }).init();


            //display snapView on interaction
            var snapViewTimeout, snapViewVisible;

            function showSnapView(noTimeout) {
                if(!options.snapView) return;

                if (snapViewVisible || viewer.zoomValue <= 100 || !viewer.loaded) return;
                clearTimeout(snapViewTimeout);
                snapViewVisible = true;
                viewer.snapView.css('opacity', 1);
                if (!noTimeout) {
                    snapViewTimeout = setTimeout(function () {
                        viewer.snapView.css('opacity', 0);
                        snapViewVisible = false;
                    }, 4000);
                }
            }

            imageWrap.on('touchmove' + eventSuffix + ' mousemove' + eventSuffix, function () {
                showSnapView();
            });

            var snapEventsCallback = {};
            snapEventsCallback['mouseenter' + eventSuffix + ' touchstart' + eventSuffix] = function () {
                snapViewVisible = false;
                showSnapView(true);
            };

            snapEventsCallback['mouseleave' + eventSuffix + ' touchend' + eventSuffix] = function () {
                snapViewVisible = false;
                showSnapView();
            };

            viewer.snapView.on(snapEventsCallback);


            //calculate elments size on window resize
            if (options.refreshOnResize) $window.on('resize' + eventSuffix, function () {
                viewer.refresh()
            });

            if (viewer._fullPage) {
                //prevent scrolling the backside if container if fixed positioned
                container.on('touchmove' + eventSuffix + ' mousewheel' + eventSuffix + ' DOMMouseScroll' + eventSuffix, function (e) {
                    e.preventDefault();
                });

                //assign event on close button
                container.find('.iv-close').on('click' + eventSuffix, function () {
                    viewer.hide();
                });
            }
        },

        //method to zoom images
        zoom: function (perc, point) {
            perc = Math.round(Math.max(100, perc));
            perc = Math.min(this.options.maxZoom, perc);

            point = point || {
                x: this.containerDim.w / 2,
                y: this.containerDim.h / 2
            };

            var self = this,
                maxZoom = this.options.maxZoom,
                curPerc = this.zoomValue,
                curImg = this.currentImg,
                containerDim = this.containerDim,
                curLeft = parseFloat(curImg.css('left')),
                curTop = parseFloat(curImg.css('top'));

            self._clearFrames();

            var step = 0;

            function zoom() {
                step++;

                if (step < 20) {
                    self._zoomFrame = requestAnimationFrame(zoom);
                }

                var tickZoom = easeOutQuart(step, curPerc, perc - curPerc, 20);


                var ratio = tickZoom / curPerc,
                    imgWidth = self.imageDim.w * tickZoom / 100,
                    imgHeight = self.imageDim.h * tickZoom / 100,
                    newLeft = -((point.x - curLeft) * ratio - point.x),
                    newTop = -((point.y - curTop) * ratio - point.y);


                if (perc < 120) {
                    newLeft = (containerDim.w - imgWidth) / 2;
                    newTop = (containerDim.h - imgHeight) / 2;
                }

                curImg.css({
                    height: imgHeight + 'px',
                    width: imgWidth + 'px',
                    left: newLeft + 'px',
                    top: newTop + 'px'
                });

                self.zoomValue = tickZoom;

                self._resizeHandle(imgWidth, imgHeight, newLeft, newTop);

                //update zoom handle position
                self.zoomHandle.css('left', ((tickZoom - 100) * self._zoomSliderLength) / (maxZoom - 100) + 'px');
            }

            zoom();
        },
        _clearFrames: function () {
            clearInterval(this._imageSlider.slideMomentumCheck);
            cancelAnimationFrame(this._imageSlider.sliderMomentumFrame);
            cancelAnimationFrame(this._zoomFrame)
        },
        resetZoom: function () {
            this.zoom(this.options.zoomValue);
        },
        //calculate dimensions of image, container and reset the image
        _calculateDimensions: function () {
            //calculate content width of image and snap image
            var self = this,
                curImg = self.currentImg,
                container = self.container,
                snapView = self.snapView,
                imageWidth = curImg.width(),
                imageHeight = curImg.height(),
                contWidth = container.width(),
                contHeight = container.height(),
                snapViewWidth = snapView.innerWidth(),
                snapViewHeight = snapView.innerHeight();

            //set the container dimension
            self.containerDim = {
                w: contWidth,
                h: contHeight
            }

            //set the image dimension
            var imgWidth, imgHeight, ratio = imageWidth / imageHeight;

            imgWidth = (imageWidth > imageHeight && contHeight >= contWidth) || ratio * contHeight > contWidth ? contWidth : ratio * contHeight;

            imgHeight = imgWidth / ratio;

            self.imageDim = {
                w: imgWidth,
                h: imgHeight
            }

            //reset image position and zoom
            curImg.css({
                width: imgWidth + 'px',
                height: imgHeight + 'px',
                left: (contWidth - imgWidth) / 2 + 'px',
                top: (contHeight - imgHeight) / 2 + 'px',
                'max-width': 'none',
                'max-height': 'none'
            });

            //set the snap Image dimension
            var snapWidth = imgWidth > imgHeight ? snapViewWidth : imgWidth * snapViewHeight / imgHeight,
                snapHeight = imgHeight > imgWidth ? snapViewHeight : imgHeight * snapViewWidth / imgWidth;

            self.snapImageDim = {
                w: snapWidth,
                h: snapHeight
            }

            self.snapImg.css({
                width: snapWidth,
                height: snapHeight
            });

            //calculate zoom slider area
            self._zoomSliderLength = snapViewWidth - self.zoomHandle.outerWidth();

        },
        refresh: function () {
            if (!this.loaded) return;
            this._calculateDimensions();
            this.resetZoom();
        },
        _resizeHandle: function (imgWidth, imgHeight, imgLeft, imgTop) {
            var curImg = this.currentImg,
                imageWidth = imgWidth || this.imageDim.w * this.zoomValue / 100,
                imageHeight = imgHeight || this.imageDim.h * this.zoomValue / 100,
                left = Math.max(-(imgLeft || parseFloat(curImg.css('left'))) * 100 / imageWidth, 0),
                top = Math.max(-(imgTop || parseFloat(curImg.css('top'))) * 100 / imageHeight, 0),
                handleWidth = Math.min(this.containerDim.w * 100 / imageWidth, 100),
                handleHeight = Math.min(this.containerDim.h * 100 / imageHeight, 100);


            this.snapHandle.css({
                top: top + '%',
                left: left + '%',
                width: handleWidth + '%',
                height: handleHeight + '%'
            });
        },
        show: function (image, hiResImg) {
            if (this._fullPage) {
                this.container.show();
                if (image) this.load(image, hiResImg);
            }
        },
        hide: function () {
            if (this._fullPage) {
                this.container.hide();
            }
        },
        options: function (key, value) {
            if (!value) return this.options[key];

            this.options[key] = value;
        },
        destroy: function (key, value) {
            var eventSuffix = '.' + this._viewerId;
            if (this._fullPage) {
                container.off(eventSuffix);
                container.find('[class^="iv"]').off(eventSuffix);
            } else {
                this.container.remove('[class^="iv"]');
            }
            $window.off(eventSuffix);
            return null;
        },
        load: function (image, hiResImg) {
            var self = this,
                container = this.container;

            container.find('.iv-snap-image,.iv-large-image').remove();
            var snapImageWrap = this.container.find('.iv-snap-image-wrap');
            snapImageWrap.prepend('<img class="iv-snap-image" src="' + image + '" />');
            this.imageWrap.prepend('<img class="iv-large-image" src="' + image + '" />');

            if (hiResImg) {
                this.imageWrap.append('<img class="iv-large-image" src="' + hiResImg + '" />')
            }

            var currentImg = this.currentImg = this.container.find('.iv-large-image');
            this.snapImg = this.container.find('.iv-snap-image');
            self.loaded = false;

            //show loader
            container.find('.iv-loader').show();
            currentImg.hide();
            self.snapImg.hide();

            //refresh the view
            function refreshView() {
                self.loaded = true;
                self.zoomValue = 100;

                //reset zoom of images
                currentImg.show();
                self.snapImg.show();
                self.refresh();
                self.resetZoom();

                //hide loader
                container.find('.iv-loader').hide();
            }

            if (imageLoaded(currentImg[0])) {
                refreshView();
            } else {
                $(currentImg[0]).on('load', refreshView);
            }

        }
    }

    ImageViewer.defaults = {
        zoomValue: 100,
        snapView: true,
        maxZoom: 500,
        refreshOnResize: true,
        zoomOnMouseWheel : true
    }

    window.ImageViewer = function (container, options) {
        var imgElm, imgSrc, hiResImg;
        if (!(container && (typeof container == "string" || container instanceof Element || container[0] instanceof Element))) {
            options = container;
            container = $('#iv-container');
        }

        container = $(container);

        if (container.is('img')) {
            imgElm = container;
            imgSrc = imgElm[0].src;
            hiResImg = imgElm.attr('high-res-src') || imgElm.attr('data-high-res-src');
            container = imgElm.wrap('<div class="iv-container" style="display:inline-block; overflow:hidden"></div>').parent();
            imgElm.css({
                opacity: 0,
                position: 'relative',
                zIndex: -1
            });
        } else {
            imgSrc = container.attr('src') || container.attr('data-src');
            hiResImg = container.attr('high-res-src') || container.attr('data-high-res-src');
        }


        var viewer = new ImageViewer(container, options);
        viewer._init();

        if (imgSrc) viewer.load(imgSrc, hiResImg);

        return viewer;
    };


    $.fn.ImageViewer = function (options) {
        return this.each(function () {
            var $this = $(this);
            var viewer = window.ImageViewer($this, options);
            $this.data('ImageViewer', viewer);
        });
    }

}((window.jQuery), window, document));
