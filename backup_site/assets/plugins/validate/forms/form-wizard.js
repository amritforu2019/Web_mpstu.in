﻿!function(e){"use strict";e(document).ready(function(){e("#wizard_horizontal").steps({headerTag:"h2",bodyTag:"div",transitionEffect:"fade"}),e("#wizard_vertical").steps({headerTag:"h2",bodyTag:"div",transitionEffect:"fade",stepsOrientation:"vertical"});var r=e("#wizard_with_validation").show();r.steps({headerTag:"h3",bodyTag:"fieldset",transitionEffect:"fade",onInit:function(r,i){var t=e(r.currentTarget).find('ul[role="tablist"] li'),o=t.length;t.css("width",100/o+"%")},onStepChanging:function(e,i,t){return i>t||(i<t&&(r.find(".body:eq("+t+") label.error").remove(),r.find(".body:eq("+t+") .error").removeClass("error")),r.validate().settings.ignore=":disabled,:hidden",r.valid())},onFinishing:function(e,i){return r.validate().settings.ignore=":disabled",r.valid()},onFinished:function(e,r){alert("Good Job!\nSubmitted!")}}),r.validate({highlight:function(r){e(r).closest(".form-group").addClass("has-error")},unhighlight:function(r){e(r).closest(".form-group").removeClass("has-error")},errorPlacement:function(r,i){e(i).parents(".form-group").append(r)},rules:{confirm:{equalTo:"#password"}}}),Array.prototype.slice.call(document.querySelectorAll(".js-switch")).forEach(function(r){var i=e(r).data("size"),t={color:"#009688"};void 0!==i&&(t.size=i);new Switchery(r,t)})})}(jQuery);