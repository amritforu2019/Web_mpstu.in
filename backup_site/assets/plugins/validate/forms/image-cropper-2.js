﻿!function(o){"use strict";o(document).ready(function(){var t=o(".image-crop-holder img"),e={aspectRatio:16/9,preview:".img-preview"};t.cropper(e),o(".js-aspect-ratio input").on("change",function(){var r=o(this).val().split("/");e.aspectRatio=parseInt(r[0])/parseInt(r[1]),t.cropper("destroy").cropper(e)}),o(".js-cropper-command button").on("click",function(){var e=o(this).data("cropperCommand").split(":");t.cropper(e[0],parseFloat(e[1]))}),o("#croppedImageModal").on("show.bs.modal",function(e){var r=t.cropper("getCroppedCanvas",{width:320,height:240});o(this).find(".modal-body").html(""),o(this).find(".modal-body").append(r),o(this).find(".modal-footer a").attr("href",r.toDataURL("image/jpeg"))}),Array.prototype.slice.call(document.querySelectorAll(".js-switch")).forEach(function(t){var e=o(t).data("size"),r={color:"#009688"};void 0!==e&&(r.size=e);new Switchery(t,r)})})}(jQuery);