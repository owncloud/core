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
 * home: goto first row of filesTable
 * end: goto last row of last page of fileTable
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
		backspace: 8,
		end: 35,
		home: 36
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

	// DOM related functions start
	function getViewContainer() {
		return $("#app-content .viewcontainer:not(.hidden)");
	}

	function getFileListInstance() {
		return getViewContainer().data('fileList');
	}

	function getFileListTrs() {
		return $("#fileList tr");
	}

	function getDeleteAllButton() {
		return $("#app-content-files .selectedActions .delete-selected").not(".hidden");
	}

	function openUploadMenu() {
		// opens the upload menu
		$("#app-content .viewcontainer:not(.hidden) .new").click();
	}

	function newFile() {
		openUploadMenu();
		$('[data-action="upload"]').click(); // file upload
	}

	function newFolder() {
		openUploadMenu();
		$('[data-action="folder"]').click(); // new folder/directory
	}

	function esc() {
		$(".stop.icon-close").click();
		$(".popovermenu").addClass('hidden');

		var fileList = getFileListInstance();
		fileList.deselectAll();

		$(".icon-close").click();
	}

	function toggleSidebar() {
		if ( !$("#app-sidebar").first().hasClass("disappear") ) {
			// side-bar opened, close it
			$(".icon-close").click();
		}
		else {
			// side-bar closed, open it
			var fileList = getFileListInstance();
			var fileTr = fileList.getKeyboardHighlight();
			if (fileTr) {
				fileTr.find(".name").click();
			}
		}
	}

	function selectTr($tr) {
		$tr.find(".selectCheckBox").click();
	}

	function isSelected($tr) {
		return $tr.hasClass('selected');
	}

	function highlightRow() {
		var fileList = getFileListInstance();
		
		var fileTr = fileList.getKeyboardHighlight();

		if (fileTr) {
			fileTr.addClass("mouseOver");
		}
	}

	function removeCurrentHighlight() {
		var fileList = getFileListInstance();
		var fileTr = fileList.getKeyboardHighlight();
		if (fileTr) {
			fileTr.removeClass("mouseOver");
		}
	}

	function rename() {
		var fileList = getFileListInstance();
		var fileTr = fileList.getKeyboardHighlight();
		if (fileTr) {
			fileTr.find(".action-menu").click();
			fileTr.find(".popovermenu").addClass("hidden");
			fileTr.find(".action-rename").click();
		}
	}
	// DOM related functions end here

	function favorite() {
		var fileList = getFileListInstance();
		if (fileList.isAllSelected()) {
			// selected all files
			fileList.favoriteAll();
		}

		else {
			// selected one/multiple files(not all files)
			fileList.favoriteSelected();		
		}

		highlightRow();
		updateView();
	}

	function updateView() {
		var fileList = getFileListInstance();
		fileList.focusSelected();
	}

	function selectDown() {
		var fileList = getFileListInstance();

		removeCurrentHighlight();

		var fileTr = fileList.getKeyboardHighlight();
		var fileName = fileList.getFileNamefromTr(fileTr);

		if (!fileTr) {
			down();
			fileTr = fileList.getKeyboardHighlight();
			fileName = fileList.getFileNamefromTr(fileTr);
		}

		if (isSelected(fileTr) && fileTr.is(":first-child")) {
			selectTr(fileTr);
			highlightRow();
			return;
		}

		if (fileName && !fileTr.is(":last-child")) {
			var setTo = fileTr.next();
			fileList.setKeyboardHighlight(setTo);
		}

		if (!fileName) {
			var setTo = getFileListTrs().first();
			fileList.setKeyboardHighlight(setTo);
			fileTr = setTo;
			fileName = fileList.getFileNamefromTr(setTo);
		}
		var prevFileName = fileName;
		fileTr = fileList.getKeyboardHighlight();
		fileName = fileList.getFileNamefromTr(fileTr);

		if (prevFileName !== fileName) {
			var toDelete = 0;
			if (isSelected(fileTr)) {
				toDelete = 1;
				selectTr(fileTr);
			}

			if (toDelete == 0) {
				selectTr(fileTr.prev());
			}
		}

		else if (!isSelected(fileTr)) {
			selectTr(fileTr);
		}

		highlightRow();

		updateView();
	}

	function selectUp() {
		var fileList = getFileListInstance();

		removeCurrentHighlight();

		var fileTr = fileList.getKeyboardHighlight();
		var fileName = fileList.getFileNamefromTr(fileTr);

		if (isSelected(fileTr) && fileTr.is(":last-child")) {
			selectTr(fileTr);
			highlightRow();
			return;
		}

		if (fileName && !fileTr.is(":first-child")) {
			var setTo = fileTr.prev();
			fileList.setKeyboardHighlight(setTo);
		}

		if (!fileName) {
			var setTo = getFileListTrs().first();
			fileList.setKeyboardHighlight(setTo);
			fileTr = setTo;
			fileName = fileList.getFileNamefromTr(setTo);
		}
		var prevFileName = fileName;
		fileTr = fileList.getKeyboardHighlight();
		fileName = fileList.getFileNamefromTr(fileTr);

		if (prevFileName !== fileName) {
			var toDelete = 0;
			if (isSelected(fileTr)) {
				toDelete = 1;
				selectTr(fileTr);
			}

			if (toDelete == 0) {
				selectTr(fileTr.next());
			}
		}
		else if (!isSelected(fileTr)) {
			selectTr(fileTr);
		}

		highlightRow();

		updateView();
	}

	function down() {
		var fileList = getFileListInstance();
		fileList.deselectAll();

		removeCurrentHighlight();

		var fileTr = fileList.getKeyboardHighlight();
		if (fileTr && !fileTr.is(":last-child")) {
			var setTo = fileTr.next();
			fileList.setKeyboardHighlight(setTo);
		}

		else {
			var setTo = getFileListTrs().first();
			fileList.setKeyboardHighlight(setTo);
		}

		highlightRow();

		updateView();
	}

	function up() {
		var fileList = getFileListInstance();
		fileList.deselectAll();

		removeCurrentHighlight();

		var fileTr = fileList.getKeyboardHighlight();
		if (fileTr && !fileTr.is(":first-child")) {
			var setTo = fileTr.prev();
			fileList.setKeyboardHighlight(setTo);
		}

		else {
			var setTo = getFileListTrs().first();
			fileList.setKeyboardHighlight(setTo);
		}

		highlightRow();

		updateView();
	}

	function goBottomRow() {
		var fileList = getFileListInstance();
		fileList.loadAllPages();

		removeCurrentHighlight();

		var setTo = getFileListTrs().last();
		fileList.setKeyboardHighlight(setTo);

		highlightRow();

		updateView();
	}

	function goTopRow() {
		var fileList = getFileListInstance();
		fileList.loadAllPages();

		removeCurrentHighlight();

		var setTo = getFileListTrs().first();
		fileList.setKeyboardHighlight(setTo);

		highlightRow();

		updateView();
	}

	function enter() {
		var fileList = getFileListInstance();
		var fileTr = fileList.getKeyboardHighlight();
		if (fileTr) {
			fileTr.find("span.nametext").click();
		}
	}

	function del() {
		var fileList = getFileListInstance();
		if (fileList.isAllSelected()) {
			// selected all files
			getDeleteAllButton().click();
		}

		else {
			// selected one/multiple files(not all files)
			fileList.deleteSelected();		
		}

		highlightRow();
		updateView();
	}

	function goParentFolder() {
		var fileList = getFileListInstance();
		var currentDir = fileList.getCurrentDirectory();
		var parentDir = OC.dirname(currentDir);

		if (currentDir != parentDir) {
			fileList.changeDirectory(parentDir);
		}
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
					selectDown();
				} else if($.inArray(keyCodes.upArrow, keys) !== -1) { // shift + up
					selectUp();
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
				toggleSidebar();
			} else if (!$("#new").hasClass("active") && ($.inArray(keyCodes.backspace, keys) !== -1)) { // goto parent folder
				goParentFolder();
			} else if (!$("#new").hasClass("active") && ($.inArray(keyCodes.end, keys) !== -1)) { // goto last tr of last page
				goBottomRow();
			} else if (!$("#new").hasClass("active") && ($.inArray(keyCodes.home, keys) !== -1)) { // goto last tr of last page
				goTopRow();
			}
			removeA(keys, event.keyCode);
		});
	};
})((OCA.Files && OCA.Files.Files) || {});
