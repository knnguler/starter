# Dropdown Menu
A dropdown component that provides a flexible and customizable UI element. It supports various items like checkbox, radio buttons, and standard clickable items.

## Example
```html
        <x-dropdown-menu>
            <x-dropdown-menu.trigger>
                <x-button variant="outline">Open</x-button>
            </x-dropdown-menu.trigger>

            <x-dropdown-menu.content class="w-56">
                <x-dropdown-menu.label>My Account</x-dropdown-menu.label>
                <x-dropdown-menu.separator />

                <x-dropdown-menu.group>
                    <x-dropdown-menu.item>
                        Profile
                        <x-dropdown-menu.shortcut>⇧⌘P</x-dropdown-menu.shortcut>
                    </x-dropdown-menu.item>
                    <x-dropdown-menu.item>
                        Billing
                        <x-dropdown-menu.shortcut>⌘B</x-dropdown-menu.shortcut>
                    </x-dropdown-menu.item>
                    <x-dropdown-menu.item>
                        Settings
                        <x-dropdown-menu.shortcut>⌘S</x-dropdown-menu.shortcut>
                    </x-dropdown-menu.item>
                    <x-dropdown-menu.item>
                        Keyboard shortcuts
                        <x-dropdown-menu.shortcut>⌘K</x-dropdown-menu.shortcut>
                    </x-dropdown-menu.item>
                </x-dropdown-menu.group>

                <x-dropdown-menu.separator />

                <x-dropdown-menu.group>
                    <x-dropdown-menu.item>
                        Team
                    </x-dropdown-menu.item>
                    <x-dropdown-menu.sub>
                        <x-dropdown-menu.sub-trigger>
                            Invite users
                        </x-dropdown-menu.sub-trigger>
                        <x-dropdown-menu.sub-content>
                            <x-dropdown-menu.item>
                                Email
                            </x-dropdown-menu.item>
                            <x-dropdown-menu.item>
                                Message
                            </x-dropdown-menu.item>
                            <x-dropdown-menu.separator />
                            <x-dropdown-menu.item>
                                More...
                            </x-dropdown-menu.item>
                        </x-dropdown-menu.sub-content>
                    </x-dropdown-menu.sub>
                    <x-dropdown-menu.item>
                        New Team
                        <x-dropdown-menu.shortcut>⌘+T</x-dropdown-menu.shortcut>
                    </x-dropdown-menu.item>
                </x-dropdown-menu.group>

                <x-dropdown-menu.separator />

                <x-dropdown-menu.item>
                    GitHub
                </x-dropdown-menu.item>
                <x-dropdown-menu.item>
                    Support
                </x-dropdown-menu.item>
                <x-dropdown-menu.item disabled>
                    API
                </x-dropdown-menu.item>

                <x-dropdown-menu.separator />

                <x-dropdown-menu.item>
                    Log out
                    <x-dropdown-menu.shortcut>⇧⌘Q</x-dropdown-menu.shortcut>
                </x-dropdown-menu.item>
            </x-dropdown-menu.content>
        </x-dropdown-menu>
```

## Installation

1. Run the following command:

```bash
php artisan lux:publish dropdown
```

2. Update `tailwind.config.js`
Ensure your Tailwind configuration file includes the necessary styles:

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {
      // You can extend your theme here if needed
    },
  },
}
```

## Components

### dropdown
The container for the dropdown component.

### dropdown.trigger
Represents the clickable element to open/close the dropdown.

### dropdown.content
The container that holds the dropdown items.

### dropdown.group
A container to group related dropdown items.

### dropdown.item
A standard clickable item inside the dropdown.

### dropdown.checkbox-item
An item with a checkbox inside the dropdown.

### dropdown.radio-group
A container to group radio button items.

### dropdown.radio-item
A radio button item inside the dropdown.

### dropdown.label
Label to categorize items in the dropdown.

### dropdown.separator
A visual separator to divide groups of dropdown items.

### dropdown.shortcut
An element to display keyboard shortcuts or additional information.

### dropdown.sub
A container for a sub-dropdown.

### dropdown.sub-trigger
An item that triggers the opening of a sub-dropdown.

### dropdown.sub-content
The content of a sub-dropdown.

## Properties

### dropdown.checkbox-item
| Prop      | Description              | Type      | Default |
|-----------|--------------------------|-----------|---------|
| `checked` | Determines if checked    | `boolean` | `false` |

### dropdown.radio-item
| Prop      | Description              | Type      | Default |
|-----------|--------------------------|-----------|---------|
| `name`    | Name for radio grouping  | `string`  | `null`  |
| `checked` | Determines if checked    | `boolean` | `false` |