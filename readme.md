# Laravel Bootstrap Components

Laravel Bootstrap 5 Blade components. This package contains a set of useful Bootstrap 5 Laravel Blade components which you can use inside your projects. It promotes DRY principles and allows you to keep your HTML nice and clean. Components include alerts, badges, buttons, form inputs (with automatic error feedback), dropdowns, icons (Font Awesome), navs, pagination (responsive), and more. The components come with full Laravel Livewire integration built in, so you can use them with or without Livewire.

This package also comes with a handy `install:bs` command which allows you to quickly add Bootstrap 5 and Font Awesome 5 (free or pro) to your Laravel project. The install command creates and configures your resource files, NPM packages, and Laravel Mix methods, so NPM is required to run it.

### Documentation

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
    - [Input](#input)
    - [Nav Dropdown](#nav-dropdown)
    - [Nav Item](#nav-item)
    - [Pagination](#pagination)
    - [Progress](#progress)
    - [Radio](#radio)
    - [Select](#select)
    - [Textarea](#textarea)
- [Publishing Components](#publishing-components)

## Installation

Require the package via composer:

```console
composer require bastinald/laravel-bootstrap-components
```

If you need to install Bootstrap, run the install command (requires NPM):

```console
php artisan install:bs
```

## Components

### Alert

A Bootstrap 5 alert:

```html
<x-bs::alert
    color="success"
    icon="check"
    :message="__('It was successful!')"
    :dismissible="true"
/>
```

#### Available Props

- `color`: Bootstrap 5 color e.g. `primary`, `danger`, `success`
- `icon`: Font Awesome icon to display before the message e.g. `check`, `times`
- `message`: the message to display, can also be placed in the `slot`
- `dismissable`: sets the alert to be dismissable or not

---

### Badge

A Bootstrap 5 badge:

```html
<x-bs::badge
    color="warning"
    icon="check"
    :label="__('Pending')"
/>
```

#### Available Props

- `color`: Bootstrap 5 color e.g. `primary`, `danger`, `success`
- `icon`: Font Awesome icon to display before the label e.g. `check`, `times`
- `label`: the label to display, can also be placed in the `slot`

---

### Button

A Bootstrap 5 button:

```html
<x-bs::button
    color="primary"
    size="lg"
    icon="check"
    :label="__('Login')"
    route="login"
    url="/login"
    toggle="collapse"
/>
```

#### Available Props

- `color`: Bootstrap 5 color e.g. `primary`, `danger`, `success`
- `size`: the size of the button e.g. `sm`, `lg`
- `icon`: Font Awesome icon to display before the label e.g. `check`, `times`
- `label`: the label to display, can also be placed in the `slot`
- `route`: sets a route for the `href` attribute to use
- `url`: sets a URL for the `href` attribute to use
- `toggle`: a `data-bs-toggle` value e.g. `collapse`, `dropdown`

#### Notes

Add a `type` attribute to your button in order to make it a standard `button`. To make your button a link, specify a `route`, `url`, or `href` for it to use.

---

### Check

A Bootstrap 5 checkbox input:

```html
<x-bs::check
    :label="__('Agree')"
    :checkLabel="__('I agree to the TOS')"
    :switch="true"
    :help="__('Please accept the TOS.')"
    wire:model.defer="agree"
/>
```

#### Available Props

- `label`: the label to display above the input
- `checkLabel`: the label to display beside the input
- `switch`: sets the input to use a switch style
- `help`: the helper text to display under the input

#### Notes

Along with all other input components of this package, error feedback will show up if a current error was found for the input `name`, or `wire:model*` attribute.

---

### Close

A Bootstrap 5 close button:

```html
<x-bs::close
    color="white"
    dismiss="modal"
/>
```

#### Available Props

- `color`: a Bootstrap 5 close button color e.g. `white`
- `dismiss`: a `data-bs-dismiss` value e.g. `modal`

---

### Color

A Bootstrap 5 color picker input:

```html
<x-bs::color
    :label="__('Favorite Color')"
    size="sm"
    prependIcon="palette"
    :prependLabel="__('Palette')"
    appendIcon="paint-brush"
    :appendLabel="__('Paint')"
    :help="__('Please pick a color.')"
    wire:model.defer="favorite_color"
/>
```

#### Available Props

- `label`: the label to display above the input
- `size`: the size of the input e.g. `sm`, `lg`
- `prependIcon`: Font Awesome icon to display before the input e.g. `check`, `times`
- `prependLabel`: a label to display before the input
- `appendIcon`: Font Awesome icon to display after the input e.g. `check`, `times`
- `appendLabel`: a label to display after the input
- `help`: the helper text to display under the input

---

### Datalist

A Bootstrap 5 datalist input:

```html
<x-bs::datalist
    :label="__('City Name')"
    size="lg"
    prependIcon="building"
    :prependLabel="__('City')"
    appendIcon="map-marker"
    :appendLabel="__('Location')"
    :options="['Toronto', 'Montreal', 'Las Vegas']"
    :help="__('Please enter your city.')"
    wire:model.defer="city_name"
/>
```

#### Available Props

- `label`: the label to display above the input
- `size`: the size of the input e.g. `sm`, `lg`
- `prependIcon`: Font Awesome icon to display before the input e.g. `check`, `times`
- `prependLabel`: a label to display before the input
- `appendIcon`: Font Awesome icon to display after the input e.g. `check`, `times`
- `appendLabel`: a label to display after the input
- `options`: an array of options for the input e.g. `['Red', 'Blue']`
- `help`: the helper text to display under the input

---

### Dropdown

A Bootstrap 5 dropdown:

```html
<x-bs::dropdown
    color="primary"
    size="lg"
    :toggleIcon="false"
    icon="filter"
    :label="__('Filter')"
    justify="end">
    <x-bs::dropdown-item 
        type="button"
        icon="address-card" 
        :label="__('By Name')"
        wire:click="$set('filter', 'name')"
    />
    <x-bs::dropdown-item
        type="button"
        icon="calendar" 
        :label="__('By Age')"
        wire:click="$set('filter', 'age')"
    />
</x-bs::dropdown>
```

#### Available Props

- `color`: a Bootstrap 5 color e.g. `primary`, `danger`, `success`
- `size`: the size of the dropdown button e.g. `sm`, `lg`
- `toggleIcon`: sets if it should display the toggle arrow icon
- `icon`: Font Awesome icon to display before the label e.g. `check`, `times`
- `label`: the dropdown button label to display
- `justify`: the justification for the dropdown menu e.g. `start`, `end`
- `slot`: the dropdown menu items

---

### Dropdown Item

A Bootstrap 5 dropdown menu item:

```html
<x-bs::dropdown-item
    icon="check"
    :label="__('Login')"
    route="login"
    url="/login"
/>
```

#### Available Props

- `icon`: Font Awesome icon to display before the label e.g. `check`, `times`
- `label`: the label to display, can also be placed in the `slot`
- `route`: sets a route for the `href` attribute to use
- `url`: sets a URL for the `href` attribute to use

#### Notes

Dropdown items can be buttons or links. This logic works the same as a `button` component. So specify a button `type`, `route`, `url`, or `href` to use.

---

### Icon

A Font Awesome icon:

```html
<x-bs::icon
    name="cog"
    color="dark"
    style="light"
    size="lg"
    :spin="false"
    :pulse="false"
/>
```

#### Available Props

- `name`: Font Awesome icon name e.g. `cog`, `user`
- `color`: Bootstrap 5 color e.g. `primary`, `danger`, `success`
- `style`: Font Awesome style e.g. `solid`, `light`, `brands`
- `size`: Font Awesome icon size e.g. `sm`, `lg`, `3x`
- `spin`: set the icon to use a spin animation
- `pulse`: set the icon to use a pulse animation

#### Notes

If you need to change the global Font Awesome icon style used by other components, you can publish the package config file and change `font_awesome_style` to whatever is required. The `install:bs` command will use `solid` for free, and `light` for pro by default.

---

### Input

A Bootstrap 5 text input:

```html
<x-bs::input
    :label="__('Email Address')"
    size="sm"
    prependIcon="Envelope"
    :prependLabel="__('Email')"
    appendIcon="paper-plane"
    :appendLabel="__('Send')"
    :help="__('Please enter your email.')"
    wire:model.defer="email_address"
/>
```

#### Available Props

- `label`: the label to display above the input
- `size`: the size of the input e.g. `sm`, `lg`
- `prependIcon`: Font Awesome icon to display before the input e.g. `check`, `times`
- `prependLabel`: a label to display before the input
- `appendIcon`: Font Awesome icon to display after the input e.g. `check`, `times`
- `appendLabel`: a label to display after the input
- `help`: the helper text to display under the input

---

### Nav Dropdown

A Bootstrap 5 nav dropdown:

```html
<x-bs::nav-dropdown
    :toggleIcon="false"
    icon="user-circle"
    :label="Auth::user()->name"
    justify="end">
    <x-bs::dropdown-item 
        type="button"
        icon="edit" 
        :label="__('Update Profile')"
        wire:click="$emit('showModal', 'profile.update')"
    />
    <x-bs::dropdown-item
        type="button"
        icon="sign-out-alt" 
        :label="__('Logout')"
        wire:click="logout"
    />
</x-bs::nav-dropdown>
```

#### Available Props

- `toggleIcon`: sets if it should display the toggle arrow icon
- `icon`: Font Awesome icon to display before the label e.g. `check`, `times`
- `label`: the dropdown button label to display
- `justify`: the justification for the dropdown menu e.g. `start`, `end`
- `slot`: the dropdown menu items

---

### Nav Item

A Bootstrap 5 nav menu item:

```html
<x-bs::nav-item
    icon="users"
    :label="__('Users')"
    route="users"
    url="/users"
/>
```

#### Available Props

- `icon`: Font Awesome icon to display before the label e.g. `check`, `times`
- `label`: the label to display, can also be placed in the `slot`
- `route`: sets a route for the `href` attribute to use
- `url`: sets a URL for the `href` attribute to use

---

### Pagination

Responsive Bootstrap 5 pagination links:

```html
<x-bs::pagination
    :links="App\Models\User::paginate()"
    justify="center"
/>
```

#### Available Props

- `links`: the paginated Laravel models
- `justify`: the justification for the pagination e.g. `center`, `end`

#### Notes

If you are using this inside of a Livewire component, the package is smart enough to use the Livewire pagination views. Just make sure your Livewire component is using the `WithPagination` trait. This component is also responsive, so it will show simple previous/next links on mobile, and full numbered links on desktop.

---

### Progress

A Bootstrap 5 progress bar:

```html
<x-bs::progress
    height="10"
    :striped="true"
    :animated="true"
    color="success"
    percent="25"
    :label="__('25% Complete')"
/>
```

#### Available Props

- `height`: sets the height of the progress bar in pixels
- `striped`: sets the progress bar to use striped styling
- `animated`: sets the progress bar to be animated
- `color`: a Bootstrap 5 color e.g. `primary`, `danger`, `success`
- `percent`: sets the percentage for the progress bar
- `label`: the label to display inside the progress bar

---

### Radio

A Bootstrap 5 radio input:

```html
<x-bs::radio
    :label="__('Gender')"
    :switch="true"
    :options="['Male', 'Female', 'Apache Attack Helicopter']"
    :help="__('Please select your gender.')"
    wire:model.defer="gender"
/>
```

#### Available Props

- `label`: the label to display above the input
- `switch`: sets the input to use a switch style
- `options`: an array of options for the input e.g. `['Red', 'Blue']`
- `help`: the helper text to display under the input

#### Notes

The `options` can be an indexed or associative array. If the array is associative, the array keys will be used for the option values, and the array values will be used for the option labels. This works the same for the `select` component.

---

### Select

A Bootstrap 5 select input:

```html
<x-bs::select
    :label="__('Your Country')"
    size="lg"
    prependIcon="globe"
    :prependLabel="__('Country')"
    appendIcon="map-marker-alt"
    :appendLabel="__('Location')"
    :placeholder="__('Select Country')"
    :blankOption="true"
    :options="['Australia', 'Canada', 'USA']"
    :help="__('Please select your country.')"
    wire:model.defer="your_country"
/>
```

#### Available Props

- `label`: the label to display above the input
- `size`: the size of the input e.g. `sm`, `lg`
- `prependIcon`: Font Awesome icon to display before the input e.g. `check`, `times`
- `prependLabel`: a label to display before the input
- `appendIcon`: Font Awesome icon to display after the input e.g. `check`, `times`
- `appendLabel`: a label to display after the input
- `placeholder`: a placeholder to use for a blank first option
- `blankOption`: include a blank first option for the input
- `options`: an array of options for the input e.g. `['Red', 'Blue']`
- `help`: the helper text to display under the input

#### Notes

The `options` prop works the same as a `radio`. So you can specify an indexed or associative array, and the options will use the keys and/or values accordingly.

---

### Textarea

A Bootstrap 5 textarea input:

```html
<x-bs::textarea
    :label="__('Biography')"
    size="sm"
    prependIcon="address-card"
    :prependLabel="__('About')"
    appendIcon="user"
    :appendLabel="__('Me')"
    :help="__('Please tell us about yourself.')"
    wire:model.defer="biography"
/>
```

#### Available Props

- `label`: the label to display above the input
- `size`: the size of the input e.g. `sm`, `lg`
- `prependIcon`: Font Awesome icon to display before the input e.g. `check`, `times`
- `prependLabel`: a label to display before the input
- `appendIcon`: Font Awesome icon to display after the input e.g. `check`, `times`
- `appendLabel`: a label to display after the input
- `help`: the helper text to display under the input

## Publishing Components

If you need to tweak the components, publish the package files:

```console
php artisan vendor:publish --tag=laravel-bootstrap-components
```

Now you may edit the component view files inside `resources/views/vendor/bs` to your needs. The package will use these view files to render the components.
