@props([
    'name' => null,
    'default' => '#14b8a6',
    'size' => null,
    'invalid' => false,
])

<div
    x-data="{
        color: '{{ $default }}',
        textInput: '{{ $default }}',
        message: null,

        init() {
            this.$watch('textInput', value => {
                if (this.isValidColor(value)) {
                    this.color = this.toHex(value)
                    this.message = null
                } else {
                    this.message = 'Invalid color'
                }
            })

            this.$watch('color', value => {
                this.textInput = value
            })
        },

        isValidColor(value) {
            const el = document.createElement('div')
            el.style.color = value
            return el.style.color !== ''
        },

        toHex(color) {
            const ctx = document.createElement('canvas').getContext('2d')
            ctx.fillStyle = color
            return ctx.fillStyle
        }
    }"
    class="relative"
>
    <div class="relative">
        <div class="absolute inset-y-0 start-3 flex items-center">
            <label class="relative size-5 rounded-full cursor-pointer"
                   :style="{ backgroundColor: color }">
                <input
                    type="color"
                    x-model="color"
                    class="absolute inset-0 opacity-0 cursor-pointer"
                />
            </label>
        </div>

        <input
            type="text"
            x-model="textInput"
            @isset($name) name="{{ $name }}" @endisset
            class="appearance-none file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/50 border-input flex w-full min-w-0 rounded-xl border bg-transparent shadow-xs transition-[color,box-shadow] outline-none text-foreground  px-3 ps-10 h-10 text-sm"
        />
    </div>

    <p x-show="message" x-text="message"
       class="mt-1 text-xs text-destructive"></p>
</div>
