<!DOCTYPE html >
<html <?php language_attributes(); ?> class="dark dark:bg-gray-950">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="fixed inset-x-0 top-0 z-10 border-b border-black/5 dark:border-white/10">
    <div class="bg-white dark:bg-gray-950">
      <div class="flex h-14 items-center justify-between gap-8 px-4 sm:px-6">
        <div class="flex items-center gap-4">
          <a class="shrink-0 d-inline-block" aria-label="Home" href="/">
            <img class="w-[150px]" src="<?php echo get_template_directory_uri() . '/public/images/logo_white.png'; ?>" alt="Bale Digital">
          </a>
        </div>
        <div class="flex items-center gap-6 max-md:hidden">
          <button type="button" class="inline-flex items-center gap-1 rounded-full bg-gray-950/2 px-2 py-1 inset-ring inset-ring-gray-950/8 dark:bg-white/5 dark:inset-ring-white/2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="-ml-0.5 size-4 fill-gray-600 dark:fill-gray-500">
              <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd"></path>
            </svg>
            <kbd class="hidden font-sans text-xs/4 text-gray-500 dark:text-gray-400 [.os-macos_&amp;]:block">⌘K</kbd>
            <kbd class="hidden font-sans text-xs/4 text-gray-500 not-[.os-macos_&amp;]:block dark:text-gray-400">Ctrl&nbsp;K</kbd>
          </button>
          <a class="text-sm/6 text-gray-950 dark:text-white" href="/docs">About</a>
          <a class="text-sm/6 text-gray-950 dark:text-white" href="/blog">Blog</a>
          <a class="text-sm/6 text-gray-950 dark:text-white" href="/showcase">Contact Us</a>
        </div>
        <div class="flex items-center gap-2.5 md:hidden">
          <button type="button" aria-label="Search" class="inline-grid size-7 place-items-center rounded-md">
            <svg viewBox="0 0 16 16" fill="currentColor" class="size-4">
              <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <button type="button" class="relative inline-grid size-7 place-items-center rounded-md text-gray-950 hover:bg-gray-950/5 dark:text-white dark:hover:bg-white/10 undefined" aria-label="Navigation">
            <span class="absolute top-1/2 left-1/2 size-11 -translate-1/2 pointer-fine:hidden"></span>
            <svg viewBox="0 0 16 16" fill="currentColor" class="size-4">
              <path d="M8 2a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM8 6.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM9.5 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div> 