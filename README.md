## Livewire package to create toast notification

#### To use this package, you must have TailwindCss and AlpineJs installed in the project.

#### The icon library used in the package is remixicon.com

### Installation

Use the composer command:

    composer require windsondias/livewire-toasts

It is also necessary to add the relative path to the package folder in tailwind.config.js within the content key, starting from the vendor folder:
    
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/windsondias/livewire-toasts/resources/**/*.blade.php",
    ],

Add the component to your layout within the body tag

    @persist('toast')
        <x-notifications::toast/>
    @endpersist

To use, simply call from a livewire component:

    $this->success('Message');
    
    $this->error('Message');

    $this->information('Message');

    $this->warning('Message');