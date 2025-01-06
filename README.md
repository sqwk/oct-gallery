_**Depreceated:** While this plugin is fully functional, it won't be developed further. The functionality that this plugin offers can be obtained through [tailor](https://docs.octobercms.com/3.x/cms/tailor/introduction.html) and the [mediafinder](https://docs.octobercms.com/3.x/element/form/widget-mediafinder.html) or [file upload](https://docs.octobercms.com/3.x/element/form/widget-fileupload.html) field types._

# Simple Gallery

- [Introduction](#introduction)
- [Create galleries](#creategalleries)
- [Display a gallery](#displaygallery)
- [Display a list of available galleries](#displaygallerieslist)
- [Help & support](#support)

<a name="introduction"></a>
## Introduction

* Admin UI for managing galleries and reordering images
* Gallery snippets for manual placement inside CMS and [static](https://octobercms.com/plugin/rainlab-pages) pages
* Link one or more galleries to a [blog post](https://octobercms.com/plugin/rainlab-blog)
* Form widget for use in custom layouts
* Automatic image resizing.

This plugin is largely based on SimpleGallery by PolloZen.

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

### For static pages

Drop the `Gallery` snippet into your static page.  Edit the `Select the gallery` option to choose the gallery to display. Ignore the `Gallery slug` option.

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

<a name="imageresizing"></a>
## Image Resizing

When the `Max Dimension` property is used for the `Gallery`  component, all gallery images will be resized using October's [Resizer](https://docs.octobercms.com/3.x/extend/services/resizer.html) so that the longest side is that length in pixels. The default is `0`, which means that original images will be used.

<a name="overriding-component-template"></a>
## Overriding the Component Template

You can expand and edit the component templates if a different resizing logic is needed (for example with more options) or if you want to use your own markup.  Right click on the `{% component %}` tag and click `Expand Component Partial`. (Also see [Customizing Default Markup](https://docs.octobercms.com/3.x/cms/themes/components.html#customizing-default-markup))

<a name="support"></a>
## Help & support

If you find some bugs please open a ticket on [GitHub](https://github.com/sqwk/oct-gallery)
