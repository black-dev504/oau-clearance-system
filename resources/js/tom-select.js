import TomSelect from "tom-select";

document.querySelectorAll(".tom-select").forEach((el) => {

    let options = {
        plugins: {
            dropdown_input: {},
        },
    };

    if (el.dataset.placeholder) {
        options.placeholder = el.dataset.placeholder;
    }

    if (el.multiple) {
        options = {
            ...options,
            plugins: {
                ...options.plugins,
                remove_button: {
                    title: "Remove this item",
                },
            },
            persist: false,
        };
    }

    new TomSelect(el, options);
});

document.addEventListener('livewire:init', () => {
    Livewire.on('clear-recipients', () => {
        document.querySelectorAll('.tom-select').forEach((select) => {
            select.tomselect?.clear();
        });
    });
});

Livewire.on('populate-recipients', ({ recipients }) => {

    const ts = document.querySelector('.tom-select')?.tomselect;

    if (!ts) return;

    ts.clear();

    ts.setValue(recipients);
});
