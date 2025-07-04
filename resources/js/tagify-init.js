import Tagify from "@yaireo/tagify";
import "@yaireo/tagify/dist/tagify.css";

document.addEventListener("DOMContentLoaded", () => {
    const input = document.querySelector("#tags-input");
    if (!input) return;

    const tagify = new Tagify(input, {
        whitelist: [],
        enforceWhitelist: false,
        dropdown: {
            enabled: 1,
            fuzzySearch: true,
        },
    });

    fetch("/tags/suggest")
        .then((res) => res.json())
        .then((data) => {
            tagify.settings.whitelist = data;
        });
});
