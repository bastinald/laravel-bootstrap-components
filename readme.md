# Laravel Bootstrap Components

This package contains a set of useful Bootstrap Laravel Blade components. It promotes DRY principles and allows you to keep your HTML nice and clean. Components include alerts, badges, buttons, form inputs (with automatic error feedback), dropdowns, navs, pagination (responsive), and more. The components come with Laravel Livewire integration built in, so you can use them with or without Livewire.

### Documentation

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
    - [Input](#input)
    - [Link](#link)
    - [Nav Dropdown](#nav-dropdown)
    - [Nav Link](#nav-link)
    - [Pagination](#pagination)
    - [Progress](#progress)
    - [Radio](#radio)
    - [Select](#select)
    - [Textarea](#textarea)
- [Publishing Components](#publishing-components)

## Requirements

- Bootstrap 5 must be installed via webpack first

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

- `label`: label to display, can also be placed in the `slot`
- `color`: Bootstrap color e.g. `primary`, `danger`, `success`
- `size`: Bootstrap button size e.g. `sm`, `lg`
- `route`: sets the `href` to a route
- `url`: sets the `href` to a url
- `href`: sets the `href`
- `dismiss`: a `data-bs-dismiss` value e.g. `alert`, `modal`
- `toggle`: a `data-bs-toggle` value e.g. `collapse`, `dropdown`

---

### Check

A Bootstrap checkbox input:

```html
<x-bs::check
    :label="__('Agree')"
    :checkLabel="__('I agree to the TOS')"
    :help="__('Please accept the TOS.')"
    switch
    wire:model.defer="agree"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `checkLabel`: label to display beside the input
- `help`: helper label to display under the input
- `switch`: style the input as a switch

---

### Close

A Bootstrap close button:

```html
<x-bs::close 
    dismiss="modal"
/>
```

#### Available Props & Slots

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
    wire:model.defer="favorite_color"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input

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
    wire:model.defer="city_name"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `options`: array of input options e.g. `['Red', 'Blue']`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input

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
        wire:click="$set('filter', 'name')"
    />
    <x-bs::dropdown-item
        :label="__('By Age')"
        wire:click="$set('filter', 'age')"
    />
</x-bs::dropdown>
```

#### Available Props & Slots

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

- `label`: label to display, can also be placed in the `slot`
- `route`: sets the `href` to a route
- `url`: sets the `href` to a url
- `href`: sets the `href`

---

### Input

A Bootstrap text input:

```html
<x-bs::input
    :label="__('Email Address')"
    type="email"
    :help="__('Please enter your email.')"
    wire:model.defer="email_address"
>
    <x-slot name="prepend">
        <i class="fa fa-envelope"></i>
    </x-slot>
</x-bs::input>
```

#### Available Props & Slots

- `label`: label to display above the input
- `type`: input type e.g. `text`, `email`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input

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
        wire:click="$emit('showModal', 'profile.update')"
    />
    <x-bs::dropdown-item
        :label="__('Logout')"
        wire:click="logout"
    />
</x-bs::nav-dropdown>
```

#### Available Props & Slots

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
- `justify`: Bootstrap justification e.g. `center`, `end`

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
    wire:model.defer="gender"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `options`: array of input options e.g. `['Red', 'Blue']`
- `help`: helper label to display under the input
- `switch`: sets the input to use a switch style

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
    wire:model.defer="your_country"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `placeholder`: placeholder to use for the empty first option
- `options`: array of input options e.g. `['Red', 'Blue']`
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input

---

### Textarea

A Bootstrap textarea input:

```html
<x-bs::textarea
    :label="__('Biography')"
    rows="5"
    :help="__('Please tell us about yourself.')"
    wire:model.defer="biography"
/>
```

#### Available Props & Slots

- `label`: label to display above the input
- `prepend`: addon to display before input, can be used via named slot
- `append`: addon to display after input, can be used via named slot
- `size`: Bootstrap input size e.g. `sm`, `lg`
- `help`: helper label to display under the input

## Publishing Components

Use your own component views by publishing the package files:

```console
php artisan vendor:publish --tag=laravel-bootstrap-components
```

Now edit the view files inside `resources/views/vendor/bs`. The package will use these files to render the components.
