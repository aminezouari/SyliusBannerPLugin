# syliusbannerplugin
This plugin is used to add the banner to a sylius project 

## Installation

1. Install [Sylius](https://docs.sylius.com/en/latest/book/installation/installation.html)
2.  Import the configuration

```yaml
# config/packages/sylius_banner.yaml
imports:
    - { resource: "@BlackSyliusBannerPlugin/config/app/config.php" }
```

3. Import routing

```yaml
# config/routes/sylius_banner.yaml
black_sylius_banner_shop:
    resource: "@BlackSyliusBannerPlugin/config/routes/shop.yaml"

black_sylius_banner_admin:
    resource: "@BlackSyliusBannerPlugin/config/routes/admin.yaml"
    prefix: '/%sylius_admin.path_name%'

black_sylius_banner_api:
    resource: "@BlackSyliusBannerPlugin/config/routes/api.yaml"
    
```

4. Register the bundle:

```php
<?php

// config/bundles.php

return [
    // ...
    Black\SyliusBannerPlugin\BlackSyliusBannerPlugin::class => ['all' => true],
];
```

5. Add the bundle and dependencies in your `composer.json`

`composer require black/sylius-banner-plugin:^1.0.0@dev`

6. Execute migration

```bash
bin/console doctrine:migrations:diff
bin/console doctrine:migrations:migrate
```
 
7. Render the template

```twig
# In the desired twig file

{{ render(url('black_sylius_banner_shop_banner_partial', {
    'code': 'banner1',
    'template': '@BlackSyliusBannerPlugin/_banner.html.twig' // optional (default template)
})) }}
```

__Tip:__ Replace the content of `Homepage/_banner.html.twig` with this snippet and use template
events!

##complete configuration : Brand.xml
```xml
<?xml version="1.0" ?>

<resources xmlns="https://api-platform.com/schema/metadata"
           xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
           xsi:schemaLocation="https://api-platform.com/schema/metadata https://api-platform.com/schema/metadata/metadata-2.0.xsd"
>
    <resource class="Black\SyliusBannerPlugin\Entity\Banner" shortName="Banner">
        <attribute name="validation_groups">banner</attribute>

        <collectionOperations>
            <collectionOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/banners</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">admin:banner:read</attribute>
                </attribute>
            </collectionOperation>

            <!-- <collectionOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/banners/{id}/name</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">admin:banner:read</attribute>
                </attribute>
            </collectionOperation> -->

  

            <collectionOperation name="admin_post">
                <attribute name="method">POST</attribute>
                <attribute name="path">/admin/banners</attribute>
                <attribute name="denormalization_context">
                    <attribute name="groups">admin:banner:create</attribute>
                </attribute>
            </collectionOperation>



            <collectionOperation name="shop_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/shop/banners</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">shop:banner:read</attribute>
                </attribute>
            </collectionOperation>
        </collectionOperations>

        <itemOperations>
            <itemOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/banners/{id}</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">admin:banner:read</attribute>
                </attribute>
            </itemOperation>

            <itemOperation name="admin_put">
                <attribute name="method">PUT</attribute>
                <attribute name="path">/admin/banners/{id}</attribute>
                <attribute name="denormalization_context">
                    <attribute name="groups">admin:banner:update</attribute>
                </attribute>
            </itemOperation>

            <itemOperation name="admin_delete">
                <attribute name="method">DELETE</attribute>
                <attribute name="path">/admin/banners/{id}</attribute>
            </itemOperation>

            <itemOperation name="shop_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/shop/banners/{id}</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">shop:banner:read</attribute>
                </attribute>
            </itemOperation>
        </itemOperations>

        <property name="id" identifier="false" writable="false"/>
        <property name="code" identifier="true" required="true"/>
        <property name="enabled" readable="true" writable="true"/>
        <property name="translations" required="true">
            <attribute name="openapi_context">
                <attribute name="type">object</attribute>
                <attribute name="example">
                    <attribute name="en_US">
                        <attribute name="locale">string</attribute>
                    </attribute>
                </attribute>
            </attribute>
        </property>
        <property name="channels" required="false"/>
        <property name="createdAt" writable="false"/>
        <property name="updatedAt" writable="false"/>
    </resource>
</resources>
```

## complete configuration : Slide.xml 
```xml
<?xml version="1.0" ?>

<resources xmlns="https://api-platform.com/schema/metadata"
           xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
           xsi:schemaLocation="https://api-platform.com/schema/metadata https://api-platform.com/schema/metadata/metadata-2.0.xsd"
>
    <resource class="Black\SyliusBannerPlugin\Entity\Slide" shortName="slider">
        <attribute name="validation_groups">slider</attribute>

        <collectionOperations>

            <collectionOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/sliders</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">admin:slider:read</attribute>
                </attribute>
            </collectionOperation>

            <!-- <collectionOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/sliders/{id}/name</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">admin:slider:read</attribute>
                </attribute>
            </collectionOperation> -->

  

            <collectionOperation name="admin_post">
                <attribute name="method">POST</attribute>
                <attribute name="path">/admin/sliders</attribute>
                <attribute name="denormalization_context">
                    <attribute name="groups">admin:slider:create</attribute>
                </attribute>
            </collectionOperation>



            <collectionOperation name="shop_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/shop/sliders</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">shop:slider:read</attribute>
                </attribute>
            </collectionOperation>
        </collectionOperations>

        <itemOperations>
            <itemOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/sliders/{id}</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">admin:slider:read</attribute>
                </attribute>
            </itemOperation>

            <itemOperation name="admin_put">
                <attribute name="method">PUT</attribute>
                <attribute name="path">/admin/sliders/{id}</attribute>
                <attribute name="denormalization_context">
                    <attribute name="groups">admin:slider:update</attribute>
                </attribute>
            </itemOperation>

            <itemOperation name="admin_delete">
                <attribute name="method">DELETE</attribute>
                <attribute name="path">/admin/sliders/{id}</attribute>
            </itemOperation>

            <itemOperation name="shop_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/shop/sliders/{id}</attribute>
                <attribute name="normalization_context">
                    <attribute name="groups">shop:slider:read</attribute>
                </attribute>
            </itemOperation>
        </itemOperations>

        <property name="id" identifier="false" writable="false"/>
        <property name="code" identifier="true" required="true"/>
        <property name="enabled" readable="true" writable="true"/>
        <property name="translations" required="true">
            <attribute name="openapi_context">
                <attribute name="type">object</attribute>
                <attribute name="example">
                    <attribute name="en_US">
                        <attribute name="locale">string</attribute>
                    </attribute>
                </attribute>
            </attribute>
        </property>
        <property name="channels" required="false"/>
        <property name="createdAt" writable="false"/>
        <property name="updatedAt" writable="false"/>
    </resource>
</resources>

```

## complete configuration : SlideTranslation.xml 
```xml
<?xml version="1.0" ?>

<resources xmlns="https://api-platform.com/schema/metadata"
           xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
           xsi:schemaLocation="https://api-platform.com/schema/metadata https://api-platform.com/schema/metadata/metadata-2.0.xsd"
>
    <resource class="Black\SyliusBannerPlugin\Entity\SlideTranslation" shortName="SlideTranslation">
        <attribute name="validation_groups">Slider</attribute>

        <collectionOperations />

        <itemOperations>
            <itemOperation name="admin_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/admin/slider-translations/{id}</attribute>
            </itemOperation>
            <itemOperation name="shop_get">
                <attribute name="method">GET</attribute>
                <attribute name="path">/shop/slider-translations/{id}</attribute>
            </itemOperation>
        </itemOperations>

        <property name="id" identifier="true" writable="false"/>
        <property name="locale" required="true"/>
    </resource>
</resources>
```

## Complete configuration

```yaml
parameters:
    black_banner.uploader.filesystem: "black_sylius_banner"
        
doctrine:
    orm:
        auto_generate_proxy_classes: "%kernel.debug%"
        entity_managers:
            default:
                auto_mapping: true

knp_gaufrette:
    adapters:
        black_sylius_banner:
            safe_local:
                directory: "%sylius_core.public_dir%/media/banner/"
                create: true
    filesystems:
        black_sylius_banner:
            adapter: "%black_banner.uploader.filesystem%"
    stream_wrapper: ~

liip_imagine:
    loaders:
        black_sylius_banner:
            stream:
                wrapper: gaufrette://black_sylius_banner/
    filter_sets:
        black_sylius_banner:
            data_loader: black_sylius_banner
            filters:
                upscale: { min: [1200, 400] }
                thumbnail: { size: [1200, 400], mode: inbound }
                
sylius_grid:
    templates:
        filter:
            banner_channel: '@BlackSyliusBannerPlugin/Admin/Grid/Filter/channel.html.twig'
    grids:
        black_sylius_banner:
            driver:
                name: doctrine/orm
                options:
                    class: 'expr:parameter("black_sylius_banner.model.banner.class")'
            fields:
                code:
                    type: string
                    label: sylius.ui.code
                name:
                    type: string
                    label: sylius.ui.name
            filters:
                code:
                    label: sylius.ui.code
                    type: string
                name:
                    label: sylius.ui.name
                    type: string
                channel:
                    type: banner_channel
                    label: sylius.ui.channel
            actions:
                main:
                    create:
                        type: create
                item:
                    update:
                        type: update
                    delete:
                        type: delete
```
