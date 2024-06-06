export default {
    title: 'Laravel Query filters',
    description: 'Main repository Package for Laravel Query Filters',
    lang: 'en-US',
    themeConfig: {
        logo: '/logo.svg',
        socialLinks: [
            { icon: "github", link: "https://github.com/Oscabrera/laravel-query-filters" },
        ],
        nav: [
            { text: "Contact", link: "https://github.com/Oscabrera" },
            { text: "Changelog", link: "https://github.com/Oscabrera/laravel-query-filters/releases" },
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
                    { text: "What is?", link: "/query-filters/what-is" },
                    { text: "Structure", link: "/query-filters/structure" },
                    { text: "Filter Types", link: "/query-filters/filter-types" },
                    { text: "Example", link: "/query-filters/example" },
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