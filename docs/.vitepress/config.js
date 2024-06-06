export default {
    title: 'Laravel Query Options',
    description: 'Main repository Package for Laravel Query Options',
    lang: 'en-US',
    themeConfig: {
        logo: '/logo.svg',
        socialLinks: [
            { icon: "github", link: "https://github.com/Oscabrera/laravel-query-options" },
        ],
        nav: [
            { text: "Contact", link: "https://github.com/Oscabrera" },
            { text: "Changelog", link: "https://github.com/Oscabrera/laravel-query-options/releases" },
        ],
        sidebar: [
            {
                text: "getting Started",
                items: [
                    { text: "Introduction", link: "getting-started/Introduction" },
                ],
            },
            {
                text: "Usage",
                items: [
                    { text: "Install", link: "/usage/Install" }
                ],
            },
            {
                text: "Query Options",
                collapsible: true,
                items: [
                    { text: "What is?", link: "/query-options/what-is" },
                    { text: "Structure", link: "/query-options/structure" },
                    { text: "Filter Types", link: "/query-options/filter-types" },
                    { text: "Example", link: "/query-options/example" },
                ],
            },
            {
                text: "Code Quality",
                items: [
                    { text: "Ensuring Code Quality", link: "/code-quality/code-quality" }
                ],
            },
        ],
        footer: {
            message: "Released under the MIT License.",
            copyright: "Copyright © 2024-present Adocs",
        },
    },
    base: '/laravel-query-filters/',
}