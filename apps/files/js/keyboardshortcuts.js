/**
 * Copyright (c) 2012 Erik Sargent <esthepiking at gmail dot com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 */
/*****************************
 * Keyboard shortcuts for Files app
 * ctrl/cmd+n: new folder
 * ctrl/cmd+shift+n: new file
 * esc (while new file context menu is open): close menu
 * esc (while upload happening): cancel the upload
 * up/down: select file/folder
 * enter: open file/folder
 * delete/backspace: delete file/folder
 *****************************/
(function(Files) {
	var keys = [];
	var keyCodes = {
		shift: 16,
		n: 78,
		cmdFirefox: 224,
		cmdOpera: 17,
		leftCmdWebKit: 91,
		rightCmdWebKit: 93,
		ctrl: 17,
		esc: 27,
		downArrow: 40,
		upArrow: 38,
		enter: 13,
		del: 46
	};

	function removeA(arr) {
		var what, a = arguments,
			L = a.length,
			ax;
		while (L > 1 && arr.length) {
			what = a[--L];
			while ((ax = arr.indexOf(what)) !== -1) {
				arr.splice(ax, 1);
			}
		}
		return arr;
	}

	function newFile() {
		$("#new").addClass("active");
		$(".popup.popupTop").toggle(true);
		$('#new li[data-type="file"]').trigger('click');
		removeA(keys, keyCodes.n);
	}

	function newFolder() {
		$("#new").addClass("active");
		$(".popup.popupTop").toggle(true);
		$('#new li[data-type="folder"]').trigger('click');
		removeA(keys, keyCodes.n);
	}

	function esc() {
		$(".stop.icon-close").click();
	}

	function down() {
		var select = -1;
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				select = index + 1;
				$(this).removeClass("mouseOver");
			}
		});
		if (select === -1) {
			$("#fileList tr:first").addClass("mouseOver");
		} else {
			$("#fileList tr").each(function(index) {
				if (index === select) {
					$(this).addClass("mouseOver");
				}
			});
		}
	}

	function up() {
		var select = -1;
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				select = index - 1;
				$(this).removeClass("mouseOver");
			}
		});
		if (select === -1) {
			$("#fileList tr:last").addClass("mouseOver");
		} else {
			$("#fileList tr").each(function(index) {
				if (index === select) {
					$(this).addClass("mouseOver");
				}
			});
		}
	}

	function enter() {
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				$(this).removeClass("mouseOver");
				$(this).find("span.nametext").trigger('click');
			}
		});
	}

	function del() {
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				var self = this;

				$(self).find(".action-menu").click();
				var canDelete = $(self).find(".action-delete").length;
				$(self).find(".popovermenu").addClass("hidden");
				if(canDelete > 0) {
					// FIXME : add translation capabilities
					OC.dialogs.confirm(t('files', 'Are you sure you want to delete ') + "\"" +  $(self).find(".innernametext").text() + $(self).find(".extension").text() + "\" ?", "", function (e) {
						if (e === true) {
							$(self).find(".action-menu").click();
							$(self).find(".action-delete").click();
							$(self).removeClass("mouseOver");
						}
					}, true);
				}
				else {
					// FIXME : add translation capabilities
					OC.Notification.showTemporary(t('files', 'You don\'t have permissions to delete ' + "\"" +  $(self).find(".innernametext").text() + $(self).find(".extension").text() + "\""));
					console.log($(self).find(".action-menu").length);
				}
			}
		});
	}

	function rename() {
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				$(this).removeClass("mouseOver");
				$(this).find("a[data-action='Rename']").trigger('click');
			}
		});
	}
	Files.bindKeyboardShortcuts = function(document, $) {
		$(document).keydown(function(event) { //check for modifier keys
            if(!$(event.target).is('body')) {
                return;
            }
			var preventDefault = false;
			if ($.inArray(event.keyCode, keys) === -1) {
				keys.push(event.keyCode);
			}
			if (
			$.inArray(keyCodes.n, keys) !== -1 && ($.inArray(keyCodes.cmdFirefox, keys) !== -1 || $.inArray(keyCodes.cmdOpera, keys) !== -1 || $.inArray(keyCodes.leftCmdWebKit, keys) !== -1 || $.inArray(keyCodes.rightCmdWebKit, keys) !== -1 || $.inArray(keyCodes.ctrl, keys) !== -1 || event.ctrlKey)) {
				preventDefault = true; //new file/folder prevent browser from responding
			}
			if (preventDefault) {
				event.preventDefault(); //Prevent web browser from responding
				event.stopPropagation();
				return false;
			}
		});
		$(document).keyup(function(event) {
			// do your event.keyCode checks in here
			if (
			$.inArray(keyCodes.n, keys) !== -1 && ($.inArray(keyCodes.cmdFirefox, keys) !== -1 || $.inArray(keyCodes.cmdOpera, keys) !== -1 || $.inArray(keyCodes.leftCmdWebKit, keys) !== -1 || $.inArray(keyCodes.rightCmdWebKit, keys) !== -1 || $.inArray(keyCodes.ctrl, keys) !== -1 || event.ctrlKey)) {
				if ($.inArray(keyCodes.shift, keys) !== -1) { //16=shift, New File
					newFile();
				} else { //New Folder
					newFolder();
				}
			} else if ($("#uploadprogressbar").css("display") == "block" && $.inArray(keyCodes.esc, keys) !== -1) { //close new window
				console.log("esc");
				esc();
			} else if ($.inArray(keyCodes.downArrow, keys) !== -1) { //select file
				down();
			} else if ($.inArray(keyCodes.upArrow, keys) !== -1) { //select file
				up();
			} else if (!$("#new").hasClass("active") && $.inArray(keyCodes.enter, keys) !== -1) { //open file
				enter();
			} else if (!$("#new").hasClass("active") && $.inArray(keyCodes.del, keys) !== -1) { //delete file
				del();
			}
			removeA(keys, event.keyCode);
		});
	};
})((OCA.Files && OCA.Files.Files) || {});
