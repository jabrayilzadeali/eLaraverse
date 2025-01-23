import { setUrlParams, setUrlParam, deleteUrlParam } from "./helpers";
import { sendDataToBackend } from "./helpers";
const filterBtn = document.querySelector("[data-filter-btn]");
const dialog = document.querySelector("[data-dialog]");
const filterForm = document.querySelector("[data-dialog] form");
const searchForm = document.querySelector("[data-search-form]");
const searchInput = document.querySelector('[data-search]')
const iconUpDownArrow = document.querySelector('[data-icon-up-down-arrow]')
const iconUpArrow = document.querySelector('[data-icon-up-arrow]')
const iconDownArrow = document.querySelector('[data-icon-down-arrow]')
const stackBtn = document.querySelector('[data-stack-btn]')
const stacks = document.querySelector('[data-stacks]')
const hideColumnElements = document.querySelectorAll('[data-hide-column]')
const stacksForm = document.querySelector('[data-stacks-form]')

const modal = document.querySelector("[data-modal]");
const showModalBtns = document.querySelectorAll("[data-show-modal]");
const closeModalBtns = document.querySelectorAll("[data-close-modal]");

// "Show the dialog" button opens the dialog modally
showModalBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        modal.showModal();
    })
});

// "Close" button closes the dialog
closeModalBtns.forEach(closeBtn => {
    closeBtn.addEventListener("click", () => {
        modal.close();
    })
})

stackBtn?.addEventListener('click', () => {
    if (stacks.open) {
        stacks.close()
    } else {
        stacks.show()
    }
})

stacksForm?.addEventListener('submit', (e) => {
    e.preventDefault()
    const checkedElements = [...hideColumnElements].filter(el => el.checked).map(el => el.dataset.hideColumn)
    console.log(checkedElements)
    setUrlParams('hiddenColumns[]', checkedElements)
})

const statuses = document.querySelectorAll('[data-status]')
statuses.forEach(status => {
    status?.addEventListener('change', () => {
        const selectedOption = status.options[status.selectedIndex];
        const id = selectedOption.dataset.id
        const k = sendDataToBackend({id, status: selectedOption.value}, 'POST', '/sellers/order-status')
        console.log(k)
    })
})
console.log(statuses)




function removeHiddenColumn(columnToRemove) {
    const urlParams = new URLSearchParams(window.location.search);

    // Get all `hiddenColumns` values as an array
    const hiddenColumns = urlParams.getAll('hiddenColumns[]');

    // Clear all `hiddenColumns[]` parameters
    urlParams.delete('hiddenColumns[]');

    // Re-add only the columns that should remain
    hiddenColumns.forEach(column => {
        if (column !== columnToRemove) {
            urlParams.append('hiddenColumns[]', column);
        }
    });

    // Update the URL
    const url = window.location.href.split('?')[0];
    window.location.href = `${url}?${urlParams.toString()}`;
}

const icons = document.querySelectorAll('[data-icons]')
icons.forEach(i => {
    const iconUpDownArrow = i.querySelector('[data-icon-up-down-arrow]')
    const iconUpArrow = i.querySelector('[data-icon-up-arrow]')
    const iconDownArrow = i.querySelector('[data-icon-down-arrow]')

    iconUpDownArrow.addEventListener('click', () => {
        iconUpDownArrow.classList.toggle('hidden')
        iconUpArrow.classList.toggle('hidden')
        setUrlParam(`sort[${i.dataset.icons}]`, 'asc')
    })

    iconUpArrow.addEventListener('click', () => {
        iconUpArrow.classList.toggle('hidden')
        iconDownArrow.classList.toggle('hidden')
        setUrlParam(`sort[${i.dataset.icons}]`, 'desc')
    })

    iconDownArrow.addEventListener('click', () => {
        iconDownArrow.classList.toggle('hidden')
        iconUpDownArrow.classList.toggle('hidden')
        deleteUrlParam(`sort[${i.dataset.icons}]`);
    })
})

filterBtn?.addEventListener('click', () => {
    if (dialog.open) {
        dialog.close()
    } else {
        dialog.show()
    }
})

searchForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('search', searchInput.value)
    const url = window.location.href.split('?')[0]
    window.location.href = `${url}?${urlParams.toString()}`
})

filterForm?.addEventListener('submit', (e) => {
    e.preventDefault()
    const urlParams = new URLSearchParams(window.location.search);
    const select = document.querySelector('[data-user]')
    if (select) {
        if (select.value.trim() && select.value !== "") {
            urlParams.set('user_id', select.value)
        } else if (select.value === "") {
            urlParams.delete('user_id')
        }
    }
    const inputs = filterForm.querySelectorAll("input[type='number']")
    inputs.forEach(input => {
        if (input.value.trim() && input.value !== "") {
            urlParams.set(input.name, input.value)
        } else if (input.value === "") {
            urlParams.delete(input.name)
        }
    });
    const url = window.location.href.split('?')[0]
    window.location.href = `${url}?${urlParams.toString()}`
})
