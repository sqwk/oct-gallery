# Simple Gallery

- [Introduction](#introduction)
- [Create galleries](#creategalleries)
- [Display a gallery](#displaygallery)
- [Display a list of available galleries](#displaygallerieslist)
- [Future features](#futurefeatures)
- [Help & support](#support)

<a name="introduction"></a>
## Introduction

* Admin UI for managing galleries and reordering images
* Gallery snippets for manual placement inside CMS and [static](https://octobercms.com/plugin/rainlab-pages) pages
* Link one or more galleries to a [blog post](https://octobercms.com/plugin/rainlab-blog)
* Form widget for use in custom layouts
* Automatic image resizing using [ImageResizer](https://octobercms.com/plugin/toughdeveloper-imageresizer) if it is installed.

This plugin is largely based on [SimpleGallery by PolloZen](https://octobercms.com/plugin/pollozen-simplegallery).

This plugin does NOT include any CSS or Javascript, leaving any styling and animation up to the developer. The plugin renders clean unordered lists unless overriden.

<a name="creategalleries"></a>
## Create Galleries

- CLick on the "Galleries" option inside the main menu.
- Click on "New Gallery"
- Name the gallery
- Drag and drop any images you want and reorder them as necesarry.
- Save it!

<a name="displaygallery"></a>
## Display a gallery 

### For CMS pages

Drop the `Gallery` component into your page. Edit the `Select the gallery` option, if you want to display a specific gallery.

If you you want to load a dynamic gallery depending the on the url, specify the `Gallery slug` and leave `Select the gallery` set to the default `Using gallery slug`. For example, creating a CMS page with the URL `/gallery/:slug` and including the `Gallery` component with the slug `Gallery slug` set to `:slug` will display the `Test` gallery when visiting the url `/gallery/test`.

If [ImageResizer](https://octobercms.com/plugin/toughdeveloper-imageresizer) is installed, you can specify a `Max Dimension` for the gallery. This will automatically downsize original images to the longest side width/height. If the additional plugin is not installed, original images will be used.

### For static pages

Drop the `Gallery` snippet into your static page.  Edit the `Select the gallery` option to choose the gallery to display. Ignore the `Gallery slug` option.

If ImageResizer is installed, you can specify a `Max Dimension` for the gallery. (See CMS pages above)

### For static pages as a custom data type (Form Widget)

Include a custom field in a static page layout as follows:

    {variable name="galleryId" label="Gallery" tab="Gallery" type="gallery" placement="primary"}{/variable}

This will render a gallery picker when this layout is used by the user. The variable can then be passed on to render the actual gallery. (See CMS pages above)

### For blog posts

Blog posts can be linked up with one or more galleries on the `Galleries` tab when creating or editing a blog post. Information about connected galleries can then be accessed though the `post.gallery` variable inside your page.

<a name="displaygallerieslist"></a>
## Display a list of available galleries 

### For CMS pages

Drop the `galleries` component into your page. Edit `Gallery order` and `Results per page` as needed.

### For static pages

Drop the `galleries` snippet into your static page. Edit `Gallery order` and `Results per page` as needed.

<a name="futurefeatures"></a>
## Future Features / In the pipeline

* Pagination for the galleries list
* German and Dutch Localisation

<a name="support"></a>
## Help & support

If you find some bugs please open a ticket on [GitHub](https://github.com/sqwk/oct-gallery)
