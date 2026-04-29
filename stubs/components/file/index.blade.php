@props([
    'label' => null,
    'existingUrl' => null,
    'existingName' => null
])

<div
    x-data="{
        uploading: false,
        progress: 0,
        file: null,
        fileUrl: @js($existingUrl),
        fileName: @js($existingName),
        fileSize: null,

        init() {
            // Eğer URL var ama isim verilmemişse, URL'den ismi çıkart
            if (this.fileUrl && !this.fileName) {
                this.fileName = this.fileUrl.split('/').pop().split('?')[0];
            }
        },

        handleFileChange(event) {
            const selectedFile = event.target.files[0];
            if (selectedFile) {
                this.file = selectedFile;
                this.fileName = selectedFile.name;
                this.fileSize = selectedFile.size;
                // Yeni seçilen dosyayı da yeni sekmede açabilmek için geçici bir tarayıcı URL'si oluştur
                this.fileUrl = URL.createObjectURL(selectedFile);
            }
        },

        formatSize(bytes) {
            if (!bytes || bytes === 0) return '';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        },

        getFileIcon() {
            if (!this.fileName) return '';

            // Dosya adından uzantıyı bul
            const ext = this.fileName.split('.').pop().toLowerCase();

            // Temel SVG kapsayıcısı
            const svgBase = `<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-5 h-5 text-muted-foreground'>`;
            const svgEnd = `</svg>`;

            // İkon yolları (paths)
            const icons = {
                image: `<path d='M6.2134 8.62811L5.96682 9.19379C5.78637 9.60792 5.21357 9.60792 5.03312 9.19379L4.78656 8.62811C4.34706 7.61947 3.55545 6.81641 2.56767 6.37708L1.80805 6.03922C1.39732 5.85653 1.39732 5.25881 1.80805 5.07612L2.5252 4.75714C3.53838 4.30651 4.34417 3.47373 4.77612 2.43083L5.02932 1.81953C5.20578 1.39349 5.79417 1.39349 5.97063 1.81953L6.22382 2.43083C6.65577 3.47373 7.46158 4.30651 8.4748 4.75714L9.19188 5.07612C9.60271 5.25881 9.60271 5.85653 9.19188 6.03922L8.43228 6.37708C7.44451 6.81641 6.65288 7.61947 6.2134 8.62811ZM15 6L11.2703 12.2162L9 8L2 21H23L15 6ZM14.9873 19L12.3897 14.2378L14.8976 10.058L19.6667 19H14.9873ZM12.6516 19H5.34843L9 12.2185L12.6516 19Z'/>`,
                archive: `<path d='M21 5C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5H16V7H18V5H21ZM18 13H16V15H14V18H18V13ZM16 11H14V13H16V11ZM18 9H16V11H18V9ZM16 7H14V9H16V7Z'></path>`,
                code: `<path d='M23 12L15.9289 19.0711L14.5147 17.6569L20.1716 12L14.5147 6.34317L15.9289 4.92896L23 12ZM3.82843 12L9.48528 17.6569L8.07107 19.0711L1 12L8.07107 4.92896L9.48528 6.34317L3.82843 12Z'/>`,
                video: `<path d='M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z'/><path d='M14 2v4a2 2 0 0 0 2 2h4'/><path d='m10 11 5 3-5 3v-6Z'/>`,
                audio: `<path d='M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z'/><path d='M14 2v4a2 2 0 0 0 2 2h4'/><path d='M8 13h2l3 3V10l-3 3H8Z'/><path d='M16 15.54a4 4 0 0 0 0-7.08'/>`,
                text: `<path d='M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z'/><path d='M14 2v4a2 2 0 0 0 2 2h4'/><path d='M8 13h8'/><path d='M8 17h8'/><path d='M8 9h2'/>`,
                default: `<path d='M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z'/><path d='M14 2v4a2 2 0 0 0 2 2h4'/>`
            };

            const extMap = {
                'png': 'image', 'jpg': 'image', 'jpeg': 'image', 'gif': 'image', 'svg': 'image', 'webp': 'image',
                'zip': 'archive', 'rar': 'archive', '7z': 'archive', 'tar': 'archive', 'gz': 'archive',
                'html': 'code', 'css': 'code', 'js': 'code', 'php': 'code', 'json': 'code', 'xml': 'code',
                'mp4': 'video', 'avi': 'video', 'mkv': 'video', 'webm': 'video', 'mov': 'video',
                'mp3': 'audio', 'wav': 'audio', 'ogg': 'audio', 'm4a': 'audio',
                'pdf': 'text', 'txt': 'text', 'doc': 'text', 'docx': 'text', 'xls': 'text', 'xlsx': 'text'
            };

            const type = extMap[ext] || 'default';
            return svgBase + icons[type] + svgEnd;
        }
    }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false; progress = 0"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    class="w-full space-y-1"
>
    @if($label)
        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
            {{ $label }}
        </label>
    @endif

    <input
        type="file"
        {{ $attributes->merge(['class' => 'flex w-full text-sm text-muted-foreground rounded-md bg-transparent cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 ring-offset-background transition-colors disabled:cursor-not-allowed disabled:opacity-50 file:mr-4 file:py-2 file:px-5 file:text-accent-foreground file:rounded-xl file:text-xs file:font-medium file:cursor-pointer file:border file:border-input file:bg-background dark:file:bg-input/50 file:shadow-xs hover:file:bg-popover dark:hover:file:bg-input hover:file:text-accent-foreground file:transition-all file:duration-300']) }}
        @change="handleFileChange"
    >

    <div x-show="uploading" x-transition class="w-full relative h-1 overflow-hidden rounded-full bg-primary/20">
        <div
            class="h-full w-full flex-1 bg-primary transition-all duration-300 ease-in-out"
            x-bind:style="`transform: translateX(-${100 - progress}%)`"
        ></div>
    </div>

    <div x-show="uploading" class="text-xs text-right text-muted-foreground" x-text="`${progress}%`"></div>

    <div x-show="fileName && !uploading" x-transition style="display: none;">
        <a
            x-bind:href="fileUrl"
            target="_blank"
            class="flex items-center gap-3 py-2 cursor-pointer group"
        >
            <div
                class="flex items-center justify-center size-12 rounded-xl bg-card dark:bg-input/30 border border-border/50 [&>svg]:size-5"
                x-html="getFileIcon()">
            </div>

            <div class="flex flex-col flex-1 overflow-hidden">
                <span class="text-sm font-medium truncate text-accent-foreground group-hover:text-primary transition-colors" x-text="fileName"></span>

                <span x-show="fileSize" class="text-xs text-muted-foreground" x-text="formatSize(fileSize)"></span>
                <span x-show="!fileSize && fileUrl" class="text-xs text-muted-foreground">Mevcut Dosya (İncelemek için tıkla)</span>
            </div>

            <div class="px-2 opacity-0 group-hover:opacity-100 transition-all -translate-x-1 group-hover:translate-x-0">
                <x-icon name="right" class="size-4 text-muted-foreground"/>
            </div>
        </a>
    </div>
</div>
