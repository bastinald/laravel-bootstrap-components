# Laravel Bootstrap Components

This package contains a set of useful Bootstrap Laravel Blade components. It promotes DRY principles and allows you to keep your HTML nice and clean. Components include alerts, badges, buttons, form inputs (with automatic error feedback), dropdowns, navs, pagination (responsive), and more. The components come with Laravel Livewire integration built in, so you can use them with or without Livewire.

## Documentation

- [Requirements](#requirements)
- [Installation](#installation)
- [Components](#components)
    - [Alert](#alert)
    - [Badge](#badge)
    - [Button](#button)
    - [Check](#check)
    - [Close](#close)
    - [Color](#color)
    - [Datalist](#datalist)
    - [Dropdown](#dropdown)
    - [Dropdown Item](#dropdown-item)
    - [Icon](#icon)
    - [Image](#image)
    - [Input](#input)
    - [Link](#link)
    - [Nav Dropdown](#nav-dropdown)
    - [Nav Link](#nav-link)
    - [Pagination](#pagination)
    - [Progress](#progress)
    - [Radio](#radio)
    - [Select](#select)
    - [Textarea](#textarea)
- [Traits](#traits)
    - [WithModel](#withmodel)
- [Publishing Assets](#publishing-assets)
    - [Custom Views](#custom-views)
    - [Custom Icons](#custom-icons)

## Requirements

- Bootstrap 5 must be installed via webpack first
- Font Awesome must be installed to use icons

## Installation

Require the package via composer:

```console
composer require bastinald/laravel-bootstrap-components
```

## Components

### Alert

A Bootstrap alert:

```html
<x-bs::alert
    :label="__('It was successful!')"
    color="info"
    dismissible
/>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: label to display, can also be placed in the `slot`
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`
- `dismissible`: set the alert to be dismissible

---

### Badge

A Bootstrap badge:

```html
<x-bs::badge
    :label="__('Pending')"
    color="warning"
/>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: label to display, can also be placed in the `slot`
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`

---

### Button

A Bootstrap button:

```html
<x-bs::button
    :label="__('Login')"
    color="primary"
    size="lg"
    route="login"
/>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: label to display, can also be placed in the `slot`
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`
- `size`: Bootstrap button size e.g. `sm`, `lg`
- `type`: button type e.g. `button`, `submit`
- `route`: sets the `href` to a route
- `url`: sets the `href` to a url
- `href`: sets the `href`
- `dismiss`: a `data-bs-dismiss` value e.g. `alert`, `modal`
- `toggle`: a `data-bs-toggle` value e.g. `collapse`, `dropdown`
- `click`: Livewire action on click
- `confirm`: prompts the user for confirmation on click

---

### Check

A Bootstrap checkbox input:

```html
<x-bs::check
    :label="__('Agree')"
    :checkLabel="__('I agree to the TOS')"
    :help="__('Please accept the TOS.')"
    switch
    model="agree"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `checkLabel`: label to display beside the input
- `help`: helper label to display under the input
- `switch`: style the input as a switch
- `model`: Livewire model property key
- `lazy`: bind Livewire data on change

---

### Close

A Bootstrap close button:

```html
<x-bs::close 
    dismiss="modal"
/>
```

#### Available Props & Slots

- `color`: Bootstrap close color e.g. `white`
- `dismiss`: a `data-bs-dismiss` value e.g. `alert`, `modal`

---

### Color

A Bootstrap color picker input:

```html
<x-bs::color
    :label="__('Favorite Color')"
    :prepend="__('I like')"
    :append="_('the most.')"
    :help="__('Please pick a color.')"
    model="favorite_color"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `icon`: Font Awesome icon to show before input e.g. `cog`, `envelope`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input
- `model`: Livewire model property key
- `lazy`: bind Livewire data on change

---

### Datalist

A Bootstrap datalist input:

```html
<x-bs::datalist
    :label="__('City Name')"
    :options="['Toronto', 'Montreal', 'Las Vegas']"
    :prepend="__('I live in')"
    :append="_('right now.')"
    :help="__('Please enter your city.')"
    model="city_name"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `options`: array of input options e.g. `['Red', 'Blue']`
- `icon`: Font Awesome icon to show before input e.g. `cog`, `envelope`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input
- `model`: Livewire model property key
- `debounce`: time in ms to bind Livewire data on keyup e.g. `500`
- `lazy`: bind Livewire data on change

---

### Desc

A description list:

```html
<x-bs::desc 
    :title="__('ID')"
    :data="$user->id"
/>
```

#### Available Props & Slots

- `title`: the description list title
- `data`: the description list data

---

### Dropdown

A Bootstrap dropdown:

```html
<x-bs::dropdown
    :label="__('Filter')"
    color="danger"
>
    <x-bs::dropdown-item 
        :label="__('By Name')"
        click="$set('filter', 'name')"
    />
    <x-bs::dropdown-item
        :label="__('By Age')"
        click="$set('filter', 'age')"
    />
</x-bs::dropdown>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: dropdown label to display, can be used via named slot
- `items`: dropdown items, can also be placed in the `slot`
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`
- `size`: Bootstrap button size e.g. `sm`, `lg`

---

### Dropdown Item

A Bootstrap dropdown menu item:

```html
<x-bs::dropdown-item
    :label="__('Login')"
    route="login"
/>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: label to display, can also be placed in the `slot`
- `route`: sets the `href` to a route
- `url`: sets the `href` to a url
- `href`: sets the `href`

---

### Form

A Bootstrap form:

```html
<x-bs::form submit="login">
    <x-bs::input :label="__('Email')" type="email" model="email"/>
    <x-bs::input :label="__('Password')" type="password" model="password"/>
    <x-bs::button :label="__('Login')" type="submit"/>
</x-bs::form>
```

#### Available Props & Slots

- `submit`: Livewire action on submit

### Icon

A Font Awesome icon:

```html
<x-bs::icon
    name="cog"
/>
```

#### Available Props & Slots

- `name`: Font Awesome icon name e.g. `cog`, `rocket`
- `style`: Font Awesome icon style e.g. `solid`, `regular`, `brands`
- `size`: Font Awesome icon size e.g. `sm`, `lg`, `3x`, `5x`
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`
- `spin`: sets the icon to use a spin animation
- `pulse`: sets the icon to use a pulse animation

---

### Image

An image:

```html
<x-bs::image
    asset="images/logo.png"
    height="24"
    rounded
/>
```

#### Available Props & Slots

- `asset`: sets the `src` to an asset
- `src`: sets the `src`
- `fluid`: sets the image to be fluid width
- `thumbnail`: sets the image to use thumbnail styling
- `rounded`: sets the image to have rounded corners

---

### Input

A Bootstrap text input:

```html
<x-bs::input
    :label="__('Email Address')"
    type="email"
    :help="__('Please enter your email.')"
    model="email_address"
>
    <x-slot name="prepend">
        <i class="fa fa-envelope"></i>
    </x-slot>
</x-bs::input>
```

#### Available Props & Slots

- `label`: label to display above the input
- `type`: input type e.g. `text`, `email`
- `icon`: Font Awesome icon to show before input e.g. `cog`, `envelope`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input
- `model`: Livewire model property key
- `debounce`: time in ms to bind Livewire data on keyup e.g. `500`
- `lazy`: bind Livewire data on change

---

### Link

A hyperlink:

```html
<x-bs::link
    :label="__('Users')"
    route="users"
/>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: label to display, can also be placed in the `slot`
- `route`: sets the `href` to a route
- `url`: sets the `href` to a url
- `href`: sets the `href`

---

### Nav Dropdown

A Bootstrap nav dropdown:

```html
<x-bs::nav-dropdown
    :label="Auth::user()->name"
>
    <x-bs::dropdown-item 
        :label="__('Update Profile')"
        click="$emit('showModal', 'profile.update')"
    />
    <x-bs::dropdown-item
        :label="__('Logout')"
        click="logout"
    />
</x-bs::nav-dropdown>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: dropdown label to display, can be used via named slot
- `items`: dropdown items, can also be placed in the `slot`

---

### Nav Link

A Bootstrap nav link:

```html
<x-bs::nav-link
    :label="__('Users')"
    route="users"
/>
```

#### Available Props & Slots

- `icon`: Font Awesome icon to show before label e.g. `cog`, `envelope`
- `label`: label to display, can also be placed in the `slot`
- `route`: sets the `href` to a route
- `url`: sets the `href` to a url
- `href`: sets the `href`

---

### Pagination

Responsive Bootstrap pagination links:

```html
<x-bs::pagination
    :links="App\Models\User::paginate()"
    justify="center"
/>
```

#### Available Props & Slots

- `links`: paginated Laravel models
- `justify`: Bootstrap justification e.g. `start`, `end`

---

### Progress

A Bootstrap progress bar:

```html
<x-bs::progress
    :label="__('25% Complete')"
    percent="25"
    color="success"
    height="10"
    animated
    striped
/>
```

#### Available Props & Slots

- `label`: label to display inside the progress bar
- `percent`: percentage of the progress bar
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`
- `height`: height of the progress bar in pixels
- `animated`: animate the progress bar
- `striped`: use striped styling for the progress bar

---

### Radio

A Bootstrap radio input:

```html
<x-bs::radio
    :label="__('Gender')"
    :options="['Male', 'Female']"
    :help="__('Please select your gender.')"
    switch
    model="gender"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `options`: array of input options e.g. `['Red', 'Blue']`
- `help`: helper label to display under the input
- `switch`: sets the input to use a switch style
- `model`: Livewire model property key
- `lazy`: bind Livewire data on change

---

### Select

A Bootstrap select input:

```html
<x-bs::select
    :label="__('Your Country')"
    :placeholder="__('Select Country')"
    :options="['Australia', 'Canada', 'USA']"
    :prepend="__('I live in')"
    :append="_('right now.')"
    :help="__('Please select your country.')"
    model="your_country"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `placeholder`: placeholder to use for the empty first option
- `options`: array of input options e.g. `['Red', 'Blue']`
- `icon`: Font Awesome icon to show before input e.g. `cog`, `envelope`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input
- `model`: Livewire model property key
- `lazy`: bind Livewire data on change

---

### Textarea

A Bootstrap textarea input:

```html
<x-bs::textarea
    :label="__('Biography')"
    rows="5"
    :help="__('Please tell us about yourself.')"
    model="biography"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `icon`: Font Awesome icon to show before input e.g. `cog`, `envelope`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input
- `model`: Livewire model property key
- `debounce`: time in ms to bind Livewire data on keyup e.g. `500`
- `lazy`: bind Livewire data on change

## Traits

### WithModel

This trait makes form data model manipulation a breeze. No more having to create a Livewire component property for every single form input. All form data will be placed inside the `$model` property array.

#### Getting Model Data

Get the model data as a collection:

```php
$collection = $this->model();
```

#### Setting Model Data

Set a single value:

```php
$this->setModel('name', 'Kevin');
```

Set values using Eloquent model data:

```php
$this->setModel(User::first());
```

Set values using an array:

```php
$this->setModel([
    'name' => 'Kevin',
    'email' => 'kevin@example.com',
]);
```

#### Working With Arrays

Add an empty array item:

```php
$this->addModelItem('locations');
```

Remove an array item by its key:

```php
$this->removeModelItem('locations', 3);
```

Order an array item by its key & direction:

```php
$this->orderModelItem('locations', 3, 'up');
```

The direction should be `up` or `down`.

#### Binding Model Data

Package components work with this trait via the `model` attribute:

```html
<x-bs::input :label="__('Name')" model="name"/>
<x-bs::input :label="__('Email')" type="email" model="email"/>
```

#### Validating Model Data

Use the `validateModel` method to validate model data:

```php
$this->validateModel([
    'name' => ['required'],
    'email' => ['required', 'email'],
]);
```

This method works just like the Livewire `validate` method, so you can specify your rules in a separate `rules` method if you prefer.

## Publishing Assets

### Custom Views

Use your own component views by publishing the package views:

```console
php artisan vendor:publish --tag=laravel-bootstrap-components:views
```

Now edit the files inside `resources/views/vendor/bs`. The package will use these files to render the components.

### Custom Icons

Use your own font icons by publishing the package config:

```console
php artisan vendor:publish --tag=laravel-bootstrap-components:config
```

Now edit the `icon_class_prefix` value inside `config/laravel-bootstrap-components.php`. The package will use this class to render the icons.
