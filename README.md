# Laravel Starter Kit

A professional Laravel starter kit package featuring Livewire 4, TailwindCSS 4, and a comprehensive set of pre-built UI components.

## Features

- **Livewire 4**: Modern reactive components
- **TailwindCSS 4**: Latest CSS framework with utility-first approach
- **Pre-built Components**: Ready-to-use UI components (buttons, inputs, forms, etc.)
- **Authentication**: Complete auth system with Livewire components
- **Admin Panel**: Basic admin interface
- **Responsive Design**: Mobile-first responsive components
- **Dark Mode Support**: Built-in dark mode theming


## Installation

### 1. Install the Package

```bash
composer require knnguler/starter
```

### 2. Run the Installation Command

```bash
php artisan starter-kit:install
```

This command will:
- Install required Composer dependencies (Livewire, Sluggable, etc.)
- Update your `package.json` with TailwindCSS 4 and other frontend dependencies
- Publish all necessary stubs and scaffolding files
- Compile frontend assets
- Run database migrations

### 3. Configure Environment

Make sure your `.env` file has the necessary database and other configurations.

### 4. Serve the Application

```bash
php artisan serve
```

## Usage

After installation, your Laravel application will have:

- Authentication system with login/register pages
- Admin panel at `/admin`
- Home page with Livewire components
- Pre-built UI components available in your views

### Using Components

The package provides a comprehensive set of Blade components. Here are some examples:

#### Button Component

```blade
{{-- Basic button --}}
<x-button>Click me</x-button>

{{-- Button with variant --}}
<x-button variant="destructive">Delete</x-button>

{{-- Button with icon --}}
<x-button icon="trash">Delete</x-button>

{{-- Button with size --}}
<x-button size="lg">Large Button</x-button>

{{-- Link button --}}
<x-button href="/some-link">Link Button</x-button>
```

#### Input Component

```blade
{{-- Basic input --}}
<x-input name="email" type="email" placeholder="Enter your email" />

{{-- Input with icon --}}
<x-input name="search" icon="search" placeholder="Search..." />

{{-- Input with trailing icon --}}
<x-input name="password" type="password" iconTrailing="eye" viewable />

{{-- Clearable input --}}
<x-input name="name" clearable placeholder="Enter name" />
```

#### Card Component

```blade
<x-card>
    <x-card.header>
        <x-card.title>Card Title</x-card.title>
        <x-card.description>Card description</x-card.description>
    </x-card.header>
    <x-card.content>
        <p>Card content goes here.</p>
    </x-card.content>
    <x-card.footer>
        <x-button>Action</x-button>
    </x-card.footer>
</x-card>
```

#### Form Components

```blade
<x-field>
    <x-label for="name">Name</x-label>
    <x-input name="name" />
    <x-field.error name="name" />
</x-field>

<x-field>
    <x-label for="message">Message</x-label>
    <x-textarea name="message" rows="4" />
</x-field>

<x-field>
    <x-checkbox name="agree" label="I agree to terms" />
</x-field>
```

#### Select Component

```blade
<x-select name="country">
    <x-select.trigger>
        <x-select.value placeholder="Select a country" />
    </x-select.trigger>
    <x-select.content>
        <x-select.group>
            <x-select.label>Countries</x-select.label>
            <x-select.item value="us">United States</x-select.item>
            <x-select.item value="ca">Canada</x-select.item>
            <x-select.item value="uk">United Kingdom</x-select.item>
        </x-select.group>
    </x-select.content>
</x-select>
```

#### Table Component

```blade
<x-table>
    <x-table.header>
        <x-table.row>
            <x-table.head>Name</x-table.head>
            <x-table.head>Email</x-table.head>
            <x-table.head>Actions</x-table.head>
        </x-table.row>
    </x-table.header>
    <x-table.body>
        <x-table.row>
            <x-table.cell>John Doe</x-table.cell>
            <x-table.cell>john@example.com</x-table.cell>
            <x-table.cell>
                <x-button size="sm">Edit</x-button>
            </x-table.cell>
        </x-table.row>
    </x-table.body>
</x-table>
```

#### Dialog/Modal

```blade
<x-dialog>
    <x-dialog.trigger>
        <x-button>Open Dialog</x-button>
    </x-dialog.trigger>
    <x-dialog.content>
        <x-dialog.header>
            <x-dialog.title>Dialog Title</x-dialog.title>
            <x-dialog.description>Dialog description</x-dialog.description>
        </x-dialog.header>
        <x-dialog.body>
            <p>Dialog content here.</p>
        </x-dialog.body>
        <x-dialog.footer>
            <x-button variant="outline">Cancel</x-button>
            <x-button>Save</x-button>
        </x-dialog.footer>
    </x-dialog.content>
</x-dialog>
```

### Livewire Components

The package includes several Livewire components for authentication and admin functionality:

- `App\Livewire\Auth\Login`
- `App\Livewire\Auth\Register`
- `App\Livewire\Home\Index`
- `App\Livewire\Admin\Dashboard`

### Customization

All components are highly customizable through props and CSS classes. You can override styles by modifying the published CSS files in `resources/css/app.css`.

### Available Components

- **Avatar**: User avatars with fallback
- **Button**: Various button styles and sizes
- **Card**: Content containers
- **Checkbox**: Form checkboxes
- **Dialog**: Modal dialogs
- **Dropdown**: Dropdown menus
- **Editor**: Rich text editor
- **Field**: Form field wrapper
- **File**: File upload component
- **Icon**: Icon component
- **Image Picker**: Image selection
- **Input**: Text inputs with various features
- **Label**: Form labels
- **Link**: Styled links
- **Logo**: Logo component
- **Pagination**: Pagination controls
- **Select**: Dropdown selects
- **Sidebar**: Navigation sidebar
- **Switch**: Toggle switches
- **Table**: Data tables
- **Textarea**: Text areas

## Requirements

- PHP 8.2+
- Laravel 10+
- Node.js & npm

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
