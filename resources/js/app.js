document.addEventListener('DOMContentLoaded', function() {
    /*const dropdownButton = document.getElementById('dropdownNavbarLink');
    const dropdownMenu = document.getElementById('dropdownNavbar');

    dropdownButton.addEventListener('mouseover', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    dropdownButton.addEventListener('mouseout', () => {
        dropdownMenu.classList.toggle('hidden');
    });*/

    const dropdownToggles = document.querySelectorAll("#dropdown-toggle")

    dropdownToggles.forEach((toggle) => {
        toggle.addEventListener("mouseover", () => {
            // Find the next sibling element which is the dropdown menu
            const dropdownMenu = toggle.nextElementSibling

            // Toggle the 'hidden' class to show or hide the dropdown menu
            if (dropdownMenu.classList.contains("hidden")) {
                // Hide any open dropdown menus before showing the new one
                document.querySelectorAll("#dropdown-menu").forEach((menu) => {
                    menu.classList.add("hidden")
                })

                dropdownMenu.classList.remove("hidden")
            } else {
                dropdownMenu.classList.add("hidden")
            }
        })
    })

    // Optional: Clicking outside of an open dropdown menu closes it
    window.addEventListener("click", (event) => {
        if (!event.target.matches("#dropdown-toggle")) {
            document.querySelectorAll("#dropdown-menu").forEach((menu) => {
                if (!menu.contains(event.target)) {
                    menu.classList.add("hidden")
                }
            })
        }
    })
});
