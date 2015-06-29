/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
/**
 * Breadcrumb class
 *
 * @namespace
 *
 * @deprecated will be replaced by the breadcrumb implementation
 * of the files app in the future
 */
OC.Breadcrumb={
	container:null,
	/**
	 * @todo Write documentation
	 * @param dir
	 * @param leafName
	 * @param leafLink
	 */
	show:function(dir, leafName, leafLink){
		if(!this.container){//default
			this.container=$('#controls');
		}
		this._show(this.container, dir, leafName, leafLink);
	},
	_show:function(container, dir, leafname, leaflink){
		var self = this;

		this._clear(container);

		// show home + path in subdirectories
		if (dir) {
			//add home
			var link = OC.linkTo('files','index.php');

			var crumb=$('<div/>');
			crumb.addClass('crumb');

			var crumbLink=$('<a/>');
			crumbLink.attr('href',link);

			var crumbImg=$('<img/>');
			crumbImg.attr('src',OC.imagePath('core','places/home'));
			crumbLink.append(crumbImg);
			crumb.append(crumbLink);
			container.prepend(crumb);

			//add path parts
			var segments = dir.split('/');
			var pathurl = '';
			jQuery.each(segments, function(i,name) {
				if (name !== '') {
					pathurl = pathurl+'/'+name;
					var link = OC.linkTo('files','index.php')+'?dir='+encodeURIComponent(pathurl);
					self._push(container, name, link);
				}
			});
		}

		//add leafname
		if (leafname && leaflink) {
			this._push(container, leafname, leaflink);
		}
	},

	/**
	 * @todo Write documentation
	 * @param {string} name
	 * @param {string} link
	 */
	push:function(name, link){
		if(!this.container){//default
			this.container=$('#controls');
		}
		return this._push(OC.Breadcrumb.container, name, link);
	},
	_push:function(container, name, link){
		var crumb=$('<div/>');
		crumb.addClass('crumb').addClass('last');

		var crumbLink=$('<a/>');
		crumbLink.attr('href',link);
		crumbLink.text(name);
		crumb.append(crumbLink);

		var existing=container.find('div.crumb');
		if(existing.length){
			existing.removeClass('last');
			existing.last().after(crumb);
		}else{
			container.prepend(crumb);
		}
		return crumb;
	},

	/**
	 * @todo Write documentation
	 */
	pop:function(){
		if(!this.container){//default
			this.container=$('#controls');
		}
		this.container.find('div.crumb').last().remove();
		this.container.find('div.crumb').last().addClass('last');
	},

	/**
	 * @todo Write documentation
	 */
	clear:function(){
		if(!this.container){//default
			this.container=$('#controls');
		}
		this._clear(this.container);
	},
	_clear:function(container) {
		container.find('div.crumb').remove();
	}
};
