# Gallery with integration to [RainLab Blog](https://octobercms.com/plugin/rainlab-blog)

- [Introduction](#introduction)
- [Create Galleries](#creategalleries)
- [Display a list of available Galleries](#gallerieslist)
- [Display gallery with your own style](#displayown)
- [Display gallery with component included](#displaycomponent)
- [Link gallery to post (and display it)](#gallerypost)
- [Help - Support](#support)

<a name="introduction"></a>
## Introduction

Create galleries in the most simple way. The plugin storages the gallery as a single item, so you can call the gallery to display it wherever you want in your website or if you need, you can link one or more galleries to a blog publication (just [RainLab Blog](https://octobercms.com/plugin/rainlab-blog)) and the gallery will be available in ```post.galery``` object

<a name="creategalleries"></a>
## Create Galleries

- Just go to "Galleries Menu"
- Clic on New Gallery
- Write a name for the gallery and, if you want, a description
- Drag and drop all the images you want and...
- Save it!

As easy as that. Now, you have a gallery. It's time to use it.

<a name="gallerieslist"></a>
## Galleries List
You can create a Galleries Page using this component. Just include the Galleries component

```
[Galleries]
galleryOrder = "random"
results = 10
galleryPage = "gallery"
==
```
The component inject the the `galleries` object which contains all the galleries available.

Use a foreach loop to access each gallery with it's propertys.

`gallery.images` All the images in the gallery

`gallery.image[0].path` The path to the image 0 in the gallery (good for the thumbnail)

`gallery.url` The url to the gallery page

Here is an example to create a galleries index
```

{% for gallery in galleries %}
  <div class="item">
    <figure">
      <img src="{{ gallery.images[0].path }}" alt="{{gallery.name}}" />
      <h3>{{gallery.name}}</h3>
      <a href="{{gallery.url}}"></a>
    </figure>
  </div>
{% endfor %}

```

<a name="displayown"></a>
## Display a gallery with your own style
To do this, just include the gallery component in your page/partial.

Select the gallery you want to display using the gallery name or the slug parameter and select **Use style created by the user** in the Gallery style to display option

Then the plugin will inject the following object

	gallery

And the images will be in

	gallery.images

So, you can use it like this (using your own structure and styles of course, that's the idea...)

```
[Gallery]
idGallery = 0
markup = "user"
slug = "{{ :slug }}"
==
<div class="wrapper">
	<h3>{{gallery.name}}</h3>
	<div class="cp-sidebar-content gallery">
		<ul>
		{% for image in gallery.images %}
			<li>
			<img title="{{image.title}}" alt="{{image.description}}" src="{{ image.path }}"></a>
			</li>
		{% endfor %}
		</ul>
	</div>
</div>
```

<a name="displaycomponent"></a>
##Display gallery with the component included

To do this, just include the gallery component in your page/partial.

Choose the gallery you want to display and select **Use the style included in the component** in the Gallery style to display option

Then, in your page / partial insert the component

	{% component 'Gallery' %}

This will inject the next scripts
- Owl Carousel (Js and CSS)
- pz.js - Scritp for initialize the gallery carousel

Use this option just in an emergency, because it doesn't have too many styles and maybe the carousel is not what you need. I recommend you use the "own style" option because it offers you more flexibility.


<a name="gallerypost"></a>
##Linking a gallery to a blog post and display it

Once you have a gallery created, you can link it to a Blog Post ([RainLab Blog](https://octobercms.com/plugin/rainlab-blog)).

To do this, just go to edit your blog and find the **Galleries** tab. There you will see all the galleries created, choose one (or many, it's your call) and save it.

**You don't need to add any component to your pages / partials**, just use the Gallery objet as a other Blog property. Here is a suggested example:

```
{% if post.gallery.count != 0 %} /* Check if a gallery is attached to your blog post*/
	{% for gallery in post.gallery) %}
		<div class="wrapper-gallery">
			<h3>{{gallery.name}}</h3>
				<div class="gallery-itemscontent">
					<div id="gallery_in_post" class="owl-carousel owl-theme">
						{% for image in gallery.images %}
						<div class="item">
							<img src="{{ image.path }}" alt="">
						</div>
						{% endfor %}
					</div>
				</div>
			</div>
	{% endfor %}
{% endif %}

```
<a name="support"></a>
##Help and support

If you find some bugs or have questions, you can leave a message in the forum or [GitHub](https://github.com/sanPuerquitoProgramador/simple-awesome-gallery)