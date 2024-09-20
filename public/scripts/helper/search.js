document.addEventListener('DOMContentLoaded', () => {
    const projectsDiv = document.querySelector('#projects_div');
    if (!projectsDiv) return;

    const search = document.querySelector('#search_input');
    const projectsContainer = document.querySelector('#projects_container');

    if (projectsContainer) {
        const projects = Array.from(projectsContainer.children);

        search.addEventListener('input', () => {
            const searchTerm = search.value.trim().toLowerCase();

            let anyMatch = false;
            projects.forEach(project => {
                const contentElement = project.querySelector("h1");
                if (!contentElement) return;

                const contentText = contentElement.textContent.trim().toLowerCase();
                const isMatch = contentText.includes(searchTerm);

                project.style.display = isMatch ? 'block' : 'none';
                if (isMatch) anyMatch = true;
            });

            generateErrorMessage(anyMatch);
        });

        function generateErrorMessage(anyMatch) {
            const errMessage = document.querySelector('#search_err');
            if (!anyMatch) {
                if (!errMessage) {
                    const errorMessage = document.createElement('p');
                    errorMessage.id = 'search_err';
                    errorMessage.textContent = 'can\'t find what ur looking for';
                    errorMessage.classList.add('font-bold', 'text-red-500', 'text-2xl', 'text-center');
                    projectsContainer.appendChild(errorMessage);
                }
            } else if (errMessage) {
                errMessage.remove();
            }
        }
    }
});