@props(['element' => Str::random(3)])
<div
    class="bg-input dark:bg-input/30 border-input rounded-2xl border py-2 text-base shadow-xs"
    wire:ignore
    x-data="setupEditor(
    $wire.entangle('{{ $attributes->wire('model')->value() }}')
  )"
    x-init="() => init($refs.element)"
>
    <div class="px-4 flex items-center flex-wrap">
        {{--Paragraph--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="setParagraph()"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('paragraph', updatedAt), '': !isActive('paragraph', updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path d="M12 6v15h-2v-5a6 6 0 1 1 0-12h10v2h-3v15h-2V6h-3zm-2 0a4 4 0 1 0 0 8V6z"/>
            </svg>
            <span class="sr-only">{{ __('paragraph') }}</span>
        </x-button>
        {{--Bold--}}
        {{--Heading level 2--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleHeading(2)"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('heading', { level: 2 }, updatedAt), '': !isActive('heading', { level: 2 }, updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0H24V24H0z"
                />
                <path
                    d="M4 4v7h7V4h2v16h-2v-7H4v7H2V4h2zm14.5 4c2.071 0 3.75 1.679 3.75 3.75 0 .857-.288 1.648-.772 2.28l-.148.18L18.034 18H22v2h-7v-1.556l4.82-5.546c.268-.307.43-.709.43-1.148 0-.966-.784-1.75-1.75-1.75-.918 0-1.671.707-1.744 1.606l-.006.144h-2C14.75 9.679 16.429 8 18.5 8z"/>
            </svg>
            <span class="sr-only">h2</span>
        </x-button>
        {{--Heading level 3--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleHeading(3)"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('heading', { level: 3 }, updatedAt), '': !isActive('heading', { level: 3 }, updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0H24V24H0z"
                />
                <path
                    d="M22 8l-.002 2-2.505 2.883c1.59.435 2.757 1.89 2.757 3.617 0 2.071-1.679 3.75-3.75 3.75-1.826 0-3.347-1.305-3.682-3.033l1.964-.382c.156.806.866 1.415 1.718 1.415.966 0 1.75-.784 1.75-1.75s-.784-1.75-1.75-1.75c-.286 0-.556.069-.794.19l-1.307-1.547L19.35 10H15V8h7zM4 4v7h7V4h2v16h-2v-7H4v7H2V4h2z"/>
            </svg>
            <span class="sr-only">h3</span>
        </x-button>
        {{--Heading level 4--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleHeading(4)"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('heading', { level: 4 }, updatedAt), '': !isActive('heading', { level: 4 }, updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0H24V24H0z"
                />
                <path
                    d="M13 20h-2v-7H4v7H2V4h2v7h7V4h2v16zm9-12v8h1.5v2H22v2h-2v-2h-5.5v-1.34l5-8.66H22zm-2 3.133L17.19 16H20v-4.867z"/>
            </svg>
            <span class="sr-only">h4</span>
        </x-button>
        <div class="h-3 w-px bg-secondary mx-3"></div>
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleBold()"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('bold', updatedAt), '': !isActive('bold', updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path
                    d="M8 11h4.5a2.5 2.5 0 1 0 0-5H8v5zm10 4.5a4.5 4.5 0 0 1-4.5 4.5H6V4h6.5a4.5 4.5 0 0 1 3.256 7.606A4.498 4.498 0 0 1 18 15.5zM8 13v5h5.5a2.5 2.5 0 1 0 0-5H8z"/>
            </svg>
            <span class="sr-only">{{ __('bold') }}</span>
        </x-button>
        {{--Italic--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleItalic()"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('italic', updatedAt), '': !isActive('italic', updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path d="M15 20H7v-2h2.927l2.116-12H9V4h8v2h-2.927l-2.116 12H15z"/>
            </svg>
            <span class="sr-only">{{ __('italic') }}</span>
        </x-button>
        {{--Underline--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleUnderline()"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('underline', updatedAt), '': !isActive('underline', updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path d="M8 3v9a4 4 0 1 0 8 0V3h2v9a6 6 0 1 1-12 0V3h2zM4 20h16v2H4v-2z"/>
            </svg>
            <span class="sr-only">{{ __('underline') }}</span>
        </x-button>
        <div class="h-3 w-px bg-secondary mx-3"></div>
        {{--Align left--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="setTextAlign('left')"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive({ textAlign: 'left' }, updatedAt), '': !isActive({ textAlign: 'left' }, updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path d="M3 4h18v2H3V4zm0 15h14v2H3v-2zm0-5h18v2H3v-2zm0-5h14v2H3V9z"/>
            </svg>
            <span class="sr-only">{{ __('align left') }}</span>
        </x-button>
        {{--Align center--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="setTextAlign('center')"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive({ textAlign: 'center' }, updatedAt), '': !isActive({ textAlign: 'center' }, updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path d="M3 4h18v2H3V4zm2 15h14v2H5v-2zm-2-5h18v2H3v-2zm2-5h14v2H5V9z"/>
            </svg>
            <span class="sr-only">{{ __('align center') }}</span>
        </x-button>
        {{--Align right--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="setTextAlign('right')"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive({ textAlign: 'right' }, updatedAt), '': !isActive({ textAlign: 'right' }, updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path d="M3 4h18v2H3V4zm4 15h14v2H7v-2zm-4-5h18v2H3v-2zm4-5h14v2H7V9z"/>
            </svg>
            <span class="sr-only">{{ __('align right') }}</span>
        </x-button>
        <div class="h-3 w-px bg-secondary mx-3"></div>
        {{--Link--}}
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="toggleLink()"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('link', updatedAt), '': !isActive('link', updatedAt) }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="h-3.5 w-3.5 fill-current"
            >
                <path
                    fill="none"
                    d="M0 0h24v24H0z"
                />
                <path
                    d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"/>
            </svg>
            <span class="sr-only">{{ __('link') }}</span>
        </x-button>
        {{--Link--}}
        <div class="h-3 w-px bg-secondary mx-3"></div>
        <x-button variant="ghost" size="icon-sm"
                  type="button"
                  @click="generateAIContent()"
                  x-bind:class="{ '!bg-primary/10 !text-primary': isActive('link', updatedAt), '': !isActive('link', updatedAt) }"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-3.5 w-3.5 fill-current" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M9 4C10.1046 4 11 4.89543 11 6V12.8271C10.1058 12.1373 8.96602 11.7305 7.6644 11.5136L7.3356 13.4864C8.71622 13.7165 9.59743 14.1528 10.1402 14.7408C10.67 15.3147 11 16.167 11 17.5C11 18.8807 9.88071 20 8.5 20C7.11929 20 6 18.8807 6 17.5V17.1493C6.43007 17.2926 6.87634 17.4099 7.3356 17.4864L7.6644 15.5136C6.92149 15.3898 6.1752 15.1144 5.42909 14.7599C4.58157 14.3573 4 13.499 4 12.5C4 11.6653 4.20761 11.0085 4.55874 10.5257C4.90441 10.0504 5.4419 9.6703 6.24254 9.47014L7 9.28078V6C7 4.89543 7.89543 4 9 4ZM12 3.35418C11.2671 2.52376 10.1947 2 9 2C6.79086 2 5 3.79086 5 6V7.77422C4.14895 8.11644 3.45143 8.64785 2.94126 9.34933C2.29239 10.2415 2 11.3347 2 12.5C2 14.0652 2.79565 15.4367 4 16.2422V17.5C4 19.9853 6.01472 22 8.5 22C9.91363 22 11.175 21.3482 12 20.3287C12.825 21.3482 14.0864 22 15.5 22C17.9853 22 20 19.9853 20 17.5V16.2422C21.2044 15.4367 22 14.0652 22 12.5C22 11.3347 21.7076 10.2415 21.0587 9.34933C20.5486 8.64785 19.8511 8.11644 19 7.77422V6C19 3.79086 17.2091 2 15 2C13.8053 2 12.7329 2.52376 12 3.35418ZM18 17.1493V17.5C18 18.8807 16.8807 20 15.5 20C14.1193 20 13 18.8807 13 17.5C13 16.167 13.33 15.3147 13.8598 14.7408C14.4026 14.1528 15.2838 13.7165 16.6644 13.4864L16.3356 11.5136C15.034 11.7305 13.8942 12.1373 13 12.8271V6C13 4.89543 13.8954 4 15 4C16.1046 4 17 4.89543 17 6V9.28078L17.7575 9.47014C18.5581 9.6703 19.0956 10.0504 19.4413 10.5257C19.7924 11.0085 20 11.6653 20 12.5C20 13.499 19.4184 14.3573 18.5709 14.7599C17.8248 15.1144 17.0785 15.3898 16.3356 15.5136L16.6644 17.4864C17.1237 17.4099 17.5699 17.2926 18 17.1493Z"></path>
            </svg>
            <span class="sr-only">{{ __('ai write') }}</span>
        </x-button>
    </div>
    <div x-ref="element"
         class="prose m-0 py-5 px-4 max-h-96  max-w-none tiptap-editor overflow-y-auto prose-a:text-sky-500 hover:prose-a:text-sky-600 dark:prose-invert dark:hover:prose-a:text-sky-400"
    ></div>
    <x-dialog modal="ai" width="md">
        <x-slot:body>
            <x-field class="mb-6">
                <x-label for="ai-prompt" :value="__('Enter a prompt for AI content generation')"/>
                <x-input id="ai-prompt" type="text" x-model="aiPrompt"
                         placeholder="{{ __('e.g., Write a short introduction about Laravel.') }}"/>
            </x-field>
            <div class="flex flex-col gap-2">
                <x-button @click="generateAIContent()" class="w-full">{{ __('Generate') }}</x-button>
            </div>
        </x-slot:body>
    </x-dialog>
</div>


