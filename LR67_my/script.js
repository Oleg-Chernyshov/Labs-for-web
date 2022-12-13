const rows = document.getElementById("rows").dataset.rows

for (let i = 1; i < rows; i++) {

    const btn = document.getElementById(`change${i}`)
    btn.addEventListener("click", () => {

        const change = document.getElementById("change")
        change.classList.remove("d-none")
        document.getElementById("change_name").value = document.getElementById(`td${btn.dataset.id} 2`).textContent
        document.getElementById("change_desc").value = document.getElementById(`td${btn.dataset.id} 4`).textContent
        document.getElementById("change_cost").value = document.getElementById(`td${btn.dataset.id} 5`).textContent
        document.getElementById("send").value = btn.dataset.id
    })
}

document.getElementById("cancel").addEventListener("click", () => {
    document.getElementById("change").classList.add("d-none")
})