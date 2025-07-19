<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark dark:bg-gray-950">

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="fixed inset-x-0 top-0 z-10 border-b border-black/5 dark:border-white/10">
        <div class="bg-white dark:bg-gray-950">
            <div class="flex h-14 items-center justify-between gap-8 px-4 sm:px-6">
                <div class="flex items-center gap-4">
                    <a class="shrink-0 d-inline-block" aria-label="Home" href="/">
                        <img class="w-[150px]" src="https://placehold.co/200x40?text=Company+Logo" alt="Your Company">
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
                    <div
                        x-data="{ open: false }"
                        class="relative">
                        <button
                            x-on:click="open = true"
                            class="cursor-pointer flex items-center text-sm/6 text-gray-950 dark:text-white focus:text-gray-900 dark:focus:text-gray-100 focus:outline-none focus:shadow-inner py-2"
                            type="button">
                            <span
                                :class="open === true ? 'text-blue-600 dark:text-blue-400' : ''"
                                class="mr-1 transition-all duration-200 ease-in-out">Dropdown Menu</span>
                            <svg :class="{'transform rotate-180 text-blue-600' : open == true}" class="w-4 h-4 transition-all ease-in-out duration-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <ul
                            x-show="open"
                            x-on:click.away="open = false"
                            class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 shadow-lg absolute mt-1 right-0"
                            style="min-width:15rem">
                            <li>
                                <a href="#" class="block text-sm/6 hover:bg-gray-200 dark:hover:bg-gray-700 whitespace-no-wrap py-2 px-4">
                                    Mont Blanc
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block text-sm/6 hover:bg-gray-200 dark:hover:bg-gray-700 whitespace-no-wrap py-2 px-4">
                                    Monte Rosa
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block text-sm/6 hover:bg-gray-200 dark:hover:bg-gray-700 whitespace-no-wrap py-2 px-4">
                                    Dom <span class="text-gray-400">(no good)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-center gap-2.5 md:hidden ">
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


    <div class="isolate">
        <div class="max-w-screen overflow-x-hidden">
            <div class="grid min-h-dvh grid-cols-1 grid-rows-[1fr_1px_auto_1px_auto] justify-center pt-14.25 [--gutter-width:2.5rem] md:-mx-4 md:grid-cols-[var(--gutter-width)_minmax(0,var(--breakpoint-2xl))_var(--gutter-width)] lg:mx-0">
                <div class="left-border"></div>
                    <div>
                        <main>