<label for="course_id">Course ID:</label>
    <h3><?= $course->course_id ?? "" ?></h3>
<form method = "POST" >
    <label for="course_name">Name: </label>
    <input type="text" name="course[name]" value="<?= $course[0]->name ?? "" ?>">

    <div id="module-form">
    <input type="hidden" name = "course_id" value = "<?=$_GET['id']?>"/>
        <?php foreach ($course[0]->courseModules() as $index => $module) { ?>
            <div class="module">
                <input type="hidden" name="module_id[]" value="<?= $module[0]->module_id ?>">
                <h2>Module ID: <?= $module[0]->module_id ?></h2>
                <h2>Module Name: <?= $module[0]->name ?></h2>
                <h2>Module Year: <?= $module[0]->module_year ?></h2>
                <button class="delete-button">Delete</button>
            </div>
        <?php } ?>
    </div>

    <button type="submit">Submit</button>
        </form>
    <button id="add-module-button">Add Module</button>

    <div id="module-list-container">
        <input type="text" id="search-input" placeholder="Search module...">
        <button id="close-list-button">Close List</button>
        <div id="module-list"></div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', () => {
    const moduleForm = document.getElementById('module-form');
    const deleteButtons = moduleForm.querySelectorAll('.delete-button');

    deleteButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            const module = e.target.closest('.module');
            module.remove();
        });
    });

    const addModuleButton = document.getElementById('add-module-button');
    const moduleListContainer = document.getElementById('module-list-container');
    const moduleList = document.getElementById('module-list');
    const searchInput = document.getElementById('search-input');
    const closeListButton = document.getElementById('close-list-button');

    addModuleButton.addEventListener('click', () => {
        moduleListContainer.style.display = 'block';
        searchInput.value = '';
        searchInput.focus();
        updateModuleList();
    });

    closeListButton.addEventListener('click', () => {
        moduleListContainer.style.display = 'none';
    });

    function updateModuleList() {
        const modules = <?= json_encode($course[0]->getModules()) ?>;

        moduleList.innerHTML = '';

        modules.forEach((module) => {
            const moduleItem = document.createElement('div');
            moduleItem.classList.add('module');
            moduleItem.innerHTML = `
                <h2>Module ID: ${module.module_id}</h2>
                <h2>Module Name: ${module.name}</h2>
                <h2>Module Year: ${module.module_year}</h2>
                <input type="hidden" name="module[]" value="${module.module_id}">
                <button class="add-to-course-button">Add to Course</button>
            `;

            const addToCourseButton = moduleItem.querySelector('.add-to-course-button');
            addToCourseButton.addEventListener('click', () => {
                const moduleExists = Array.from(moduleForm.querySelectorAll('.module')).some((existingModule) => {
                    return existingModule.querySelector('h2').textContent === `Module ID: ${module.module_id}`;
                });

                if (moduleExists) {
                    alert('This module is already added to the course.');
                    return;
                }

                if (moduleForm.querySelectorAll('.module').length >= 6) {
                    alert('The maximum limit of modules (6) has been reached.');
                    return;
                }

                const newModule = document.createElement('div');
                newModule.classList.add('module');
                newModule.innerHTML = `
                    <h2>Module ID: ${module.module_id}</h2>
                    <h2>Module Name: ${module.name}</h2>
                    <h2>Module Year: ${module.module_year}</h2>
                    <input type="hidden" name="module_id[]" value="${module.module_id}">
                    <button class="delete-button">Delete</button>
                `;

                const newModuleDeleteButton = newModule.querySelector('.delete-button');
                newModuleDeleteButton.addEventListener('click', () => {
                    newModule.remove();
                });

                moduleForm.appendChild(newModule);
            });

            moduleList.appendChild(moduleItem);
        });
    }

    searchInput.addEventListener('input', () => {
        const searchQuery = searchInput.value.toLowerCase();
        const modules = <?= json_encode($course[0]->getModules()) ?>;

        const filteredModules = modules.filter((module) => {
            const moduleIDMatch = module.module_id.toString().includes(searchQuery);
            const moduleNameMatch = module.name.toLowerCase().includes(searchQuery);

            return moduleIDMatch || moduleNameMatch;
        });

        moduleList.innerHTML = '';

        filteredModules.forEach((module) => {
            const moduleItem = document.createElement('div');
            moduleItem.classList.add('module');
            moduleItem.innerHTML = `
                <h2>Module ID: ${module.module_id}</h2>
                <h2>Module Name: ${module.name}</h2>
                <h2>Module Year: ${module.module_year}</h2>
                <input type="hidden" name="selected_modules[]" value="${module.module_id}">
                <button class="add-to-course-button">Add to Course</button>
            `;

            const addToCourseButton = moduleItem.querySelector('.add-to-course-button');
            addToCourseButton.addEventListener('click', () => {
                const moduleExists = Array.from(moduleForm.querySelectorAll('.module')).some((existingModule) => {
                    return existingModule.querySelector('h2').textContent === `Module ID: ${module.module_id}`;
                });

                if (moduleExists) {
                    alert('This module is already added to the course.');
                    return;
                }

                if (moduleForm.querySelectorAll('.module').length >= 6) {
                    alert('The maximum limit of modules (6) has been reached.');
                    return;
                }

                const newModule = document.createElement('div');
                newModule.classList.add('module');
                newModule.innerHTML = `
                    <h2>Module ID: ${module.module_id}</h2>
                    <h2>Module Name: ${module.name}</h2>
                    <h2>Module Year: ${module.module_year}</h2>
                    <input type="hidden" name="selected_modules[]" value="${module.module_id}">
                    <button class="delete-button">Delete</button>
                `;

                const newModuleDeleteButton = newModule.querySelector('.delete-button');
                newModuleDeleteButton.addEventListener('click', () => {
                    newModule.remove();
                });

                moduleForm.appendChild(newModule);
            });

            moduleList.appendChild(moduleItem);
        });
    });
});

    </script>
