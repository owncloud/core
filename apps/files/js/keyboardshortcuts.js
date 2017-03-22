/**
 * Copyright (c) 2012 Erik Sargent <esthepiking at gmail dot com>
 * Copyright (c) 2017 Noveen Sachdeva <noveen.sachdeva@research.iiit.ac.in>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 */


/*****************************SHORTCUTS*******************************
 * Keyboard shortcuts for Files app
 * shift+d: new directory
 * shift+n: new file
 * shift+r: rename file/folder
 * shift+f: favorite file/folder (multiple allowed)
 * esc (while side-bar is opened): close side-bar
 * esc (while new file context menu is open): close menu
 * esc (while upload happening): cancel the upload
 * esc (while multiple files selected): de-select all files
 * up/down: select file/folder
 * enter: open file/folder
 * spacebar: toggle side-bar
 * delete: delete file/folder (multiple files also allowed)
 * backspace: goto previous broser history state
 * shift+up/down: select multiple files
 ********************************************************************/
(function(Files) {
	var keys = [];
	var keyCodes = {
		shift: 16,
		n: 78,
		d: 68,
		r: 82,
		f: 70,
		cmdFirefox: 224,
		cmdOpera: 17,
		leftCmdWebKit: 91,
		rightCmdWebKit: 93,
		ctrl: 17,
		esc: 27,
		space: 32,
		downArrow: 40,
		upArrow: 38,
		enter: 13,
		del: 46,
		backspace: 8
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
		$(".new").click();
		$('[data-action="upload"]').click();
		removeA(keys, keyCodes.n);
	}

	function newFolder() {
		$(".new").click();
		$('[data-action="folder"]').click();
		removeA(keys, keyCodes.n);
	}

	function esc() {
		$(".stop.icon-close").click();
		$(".popovermenu").addClass('hidden');

		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("selected")) {
				$(this).find(".selectCheckBox").click();
			}
		});

		$(".icon-close").click();
	}

	function favorite() {
		if ($("#select_all_files").is(":checked")) {
			// selected all files
			OCA.Files.App.fileList.favoriteAll();
		}

		else {
			var countSelected = 0;
			$("#fileList tr").each(function(index) {
				if ($(this).hasClass("selected")) {
					countSelected++;
				}
			});

			// single file favorite
			if (countSelected == 0) {
				$("#fileList tr").each(function(index) {
					var self = this;
					if ($(this).hasClass("mouseOver")) {
						if ($(this).find(".action-favorite").length > 0) {
							$(this).find(".action-favorite").click();
							return false;
						}
						else {
							OC.Notification.showTemporary(t('files', 'You don\'t have permissions to favorite ' + "\"" +  $(self).find(".innernametext").text() + $(self).find(".extension").text() + "\""));
						}
					}
				});
			}
			// multiple selected files favorite
			else {
				$("#fileList tr").each(function(index) {
					var self = this;
					if ($(this).hasClass("selected")) {
						if ($(this).find(".action-favorite").length > 0) {
							$(this).find(".action-favorite").click();
						}
						else {
							OC.Notification.showTemporary(t('files', 'You don\'t have permissions to favorite ' + "\"" +  $(self).find(".innernametext").text() + $(self).find(".extension").text() + "\""));
						}
					}
				});
			}
		}
	}

	function update_view() {
		OCA.Files.App.fileList.focusSelected();
	}

	function select_down() {
		var chosen = -100;
		var mouse = -1;
		var toDelete = 0;
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				if ($($("#fileList tr")[index+1]).hasClass("selected")) {
					toDelete = 1; // means unselect
				}
				if (! $("#fileList tr:last").hasClass("selected") ) {
					if ($($("#fileList tr")[index]).hasClass("selected")) {
						toDelete = 1; // means unselect
					}
				}
			}
		});

		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("selected")) {
				if (toDelete == 1) {
					// found the first instance with "selected", break now
					chosen = index;
					return false;
				}
				else {
					chosen = index + 1;
				}
			}
			if ($(this).hasClass("mouseOver")) {
				mouse = index + 1;
				$(this).removeClass("mouseOver");
			}
		});

		if (mouse == -1) {
			$($("#fileList tr")[0]).addClass("mouseOver");
		}
		
		if (mouse >= $("#fileList tr").length) {
			$($("#fileList tr")[$("#fileList tr").length - 1]).addClass("mouseOver");
		}

		if (chosen === -100) {
			$("#fileList tr").each(function(index) {
				if (index === mouse - 1) {
					$(this).find(".selectCheckBox").click();
				}
				if (mouse === index) {
					$(this).addClass("mouseOver");
				}
			});
		} else {
			$("#fileList tr").each(function(index) {
				if (index === chosen) {
					$(this).find(".selectCheckBox").click();
				}
				if (index === mouse) {
					$(this).addClass("mouseOver");
				}
			});
		}
		update_view();
	}

	function select_up() {
		var chosen = -100;
		var mouse = -100;
		var toDelete = 0;
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				if ($($("#fileList tr")[index-1]).hasClass("selected")) {
					toDelete = 1;
				}
				if (! $("#fileList tr:first").hasClass("selected")) {
					if ($($("#fileList tr")[index]).hasClass("selected")) {
						toDelete = 1;
					}
				}
			}
		});

		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("selected")) {
				if (toDelete == 1) {
					chosen = index;
				}
				else {
					chosen = index - 1;
					return false;
				}
			}
			if ($(this).hasClass("mouseOver")) {
				mouse = index - 1;
				$(this).removeClass("mouseOver");
			}
		});

		if ($("#fileList tr:first").hasClass("selected") && toDelete == 0) {
			return;
		}

		if (chosen == $("#fileList tr").length - 1) {
			mouse++;
		}

		if (mouse == -100) {
			$($("#fileList tr")[$("#fileList tr").length - 1]).addClass("mouseOver");
			return;
		}

		if (mouse < 0) {
			$($("#fileList tr")[0]).addClass("mouseOver");
		}

		if (chosen === -100) {
			$("#fileList tr").each(function(index) {
				if (index === mouse + 1) {
					$(this).find(".selectCheckBox").click();
				}
				if (index === mouse) {
					$(this).addClass("mouseOver");
				}
			});
		} else {
			$("#fileList tr").each(function(index) {
				if (index === chosen) {
					$(this).find(".selectCheckBox").click();
				}
				if (index === mouse) {
					$(this).addClass("mouseOver");
				}
			});
		}
		update_view();
	}

	function down() {
		var select = -1;
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				select = index + 1;
				$(this).removeClass("mouseOver");
			}
			if ($(this).hasClass("selected")) {
				$(this).find(".selectCheckBox").click();
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
		update_view();
	}

	function up() {
		var select = -1;
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				select = index - 1;
				$(this).removeClass("mouseOver");
			}
			if ($(this).hasClass("selected")) {
				$(this).find(".selectCheckBox").click();
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
		update_view();
	}

	function enter() {
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				$(this).find("span.nametext").click();
			}
		});
	}

	function toggle_sidebar() {
		if ( !$("#app-sidebar:first").hasClass("disappear") ) {
			// side-bar opened, close it
			$(".icon-close").click();
		}
		else {
			// side-bar closed, open it
			$("#fileList tr").each(function(index) {
				if ($(this).hasClass("mouseOver")) {
					$(this).find(".name").click();
				}
			});
		}
	}

	function del() {
		if ($("#select_all_files").is(":checked")) {
			// selected all files
			if ($("#app-content-files .selectedActions .delete-selected").not(".hidden").length == 0) {
				OC.Notification.showTemporary(t('files', 'You don\'t have permissions to delete all the files, try unchecking some.'));
			}
			else {
				OC.dialogs.confirm(t('files', 'Are you sure you want to delete everything?') , "", function (e) {
					if (e === true) {
						OCA.Files.App.fileList.deleteAll();
					}
				}, true);
			}
		}
		else {
			var countSelected = 0;
			$("#fileList tr").each(function(index) {
				if ($(this).hasClass("selected")) {
					countSelected++;
				}
			});

			// delete the row which is currently selected
			if (countSelected == 0) {
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
						}
					}
				});
			}
			// deletion of multiple files selected
			else {
				if ($("#app-content-files .selectedActions .delete-selected").not(".hidden").length > 0) {
					// FIXME : add translation capabilities
					OC.dialogs.confirm(t('files', 'Are you sure you want to delete the ') + "\"" +  countSelected + "\" selected files?", "", function (e) {
						if (e === true) {
							$("#app-content-files .selectedActions .delete-selected").not(".hidden").click();
						}
					}, true);
				}
				else {
					var cantDelete = "";
					var count = 0;
					$("#fileList tr").each(function(index) {
						var self = this;
						if ($(this).hasClass("selected")) {
							$(self).find(".action-menu").click();
							var canDelete = $(self).find(".action-delete").length;
							$(self).find(".popovermenu").addClass("hidden");
							if (canDelete == 0) {
								count++;
								if (count == 1) {
									cantDelete += ", try unchecking \"";
								}
								cantDelete += $(self).find(".innernametext").text() + $(self).find(".extension").text() + ", ";
							}
						}
					}).promise().done(function(){
						if (cantDelete.length > 0) {
							cantDelete = cantDelete.slice(0,-2);
							cantDelete += "\"";
						}
						OC.Notification.showTemporary(t('files', "You can't delete these files" + cantDelete));
					});
				}
			}
		}
	}

	function go_parent_folder() {
		// simulate a back button of the browser
		history.back();
	}

	function rename() {
		$("#fileList tr").each(function(index) {
			if ($(this).hasClass("mouseOver")) {
				var self = this;

				$(self).find(".action-menu").click();
				var canRename = $(self).find(".action-rename").length;
				$(self).find(".popovermenu").addClass("hidden");
				if(canRename > 0) {
					$(self).find(".action-menu").click();
					$(self).find(".action-rename").click();
					$(self).removeClass("mouseOver");
				}
				else {
					// FIXME : add translation capabilities
					OC.Notification.showTemporary(t('files', 'You don\'t have permissions to rename ' + "\"" +  $(self).find(".innernametext").text() + $(self).find(".extension").text() + "\""));
				}
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
			if ($.inArray(keyCodes.shift, keys) !== -1) { // shift key
				if ($.inArray(keyCodes.n, keys) !== -1) { // New File
					newFile();
				} else if ($.inArray(keyCodes.d, keys) !== -1) { // New Directory
					newFolder();
				} else if($.inArray(keyCodes.r, keys) !== -1) { // rename File or Folder
					rename();
				} else if($.inArray(keyCodes.downArrow, keys) !== -1) { // shift + down
					select_down();
				} else if($.inArray(keyCodes.upArrow, keys) !== -1) { // shift + up
					select_up();
				} else if($.inArray(keyCodes.f, keys) !== -1) { // shift + f
					favorite();
				}
			} else if ($.inArray(keyCodes.esc, keys) !== -1) { // close new window
				esc();
			} else if ($.inArray(keyCodes.downArrow, keys) !== -1) { // select file
				down();
			} else if ($.inArray(keyCodes.upArrow, keys) !== -1) { // select file
				up();
			} else if (!$("#new").hasClass("active") && $.inArray(keyCodes.enter, keys) !== -1) { // open file
				enter();
			} else if (!$("#new").hasClass("active") && ($.inArray(keyCodes.del, keys) !== -1)) { //delete file
				del();
			} else if (!$("#new").hasClass("active") && ($.inArray(keyCodes.space, keys) !== -1)) { // open side-bar
				toggle_sidebar();
			} else if (!$("#new").hasClass("active") && ($.inArray(keyCodes.backspace, keys) !== -1)) { // goto parent folder
				go_parent_folder();
			}
			removeA(keys, event.keyCode);
		});
	};
})((OCA.Files && OCA.Files.Files) || {});
