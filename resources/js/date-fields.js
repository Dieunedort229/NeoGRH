// Script pour gérer les champs de date personnalisés
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour combiner les champs jour/mois/année en un seul champ date
    function combineDateFields(dayId, monthId, yearId, targetId) {
        const daySelect = document.getElementById(dayId);
        const monthSelect = document.getElementById(monthId);
        const yearSelect = document.getElementById(yearId);
        const targetInput = document.getElementById(targetId);
        
        if (!daySelect || !monthSelect || !yearSelect || !targetInput) return;
        
        // Initialiser les sélecteurs avec les valeurs existantes si disponibles
        if (targetInput.value) {
            try {
                const date = new Date(targetInput.value);
                if (!isNaN(date.getTime())) {
                    daySelect.value = date.getDate();
                    monthSelect.value = String(date.getMonth() + 1).padStart(2, '0');
                    yearSelect.value = date.getFullYear();
                }
            } catch (e) {
                console.error("Erreur lors du parsing de la date:", e);
            }
        }
        
        // Fonction pour mettre à jour le champ caché
        function updateTargetField() {
            if (daySelect.value && monthSelect.value && yearSelect.value) {
                const formattedDate = `${yearSelect.value}-${monthSelect.value}-${String(daySelect.value).padStart(2, '0')}`;
                targetInput.value = formattedDate;
            } else {
                targetInput.value = '';
            }
        }
        
        // Ajouter les écouteurs d'événements
        daySelect.addEventListener('change', updateTargetField);
        monthSelect.addEventListener('change', updateTargetField);
        yearSelect.addEventListener('change', updateTargetField);
        
        // Mettre à jour le champ caché au chargement
        updateTargetField();
    }
    
    // Appliquer aux champs de date de naissance et d'embauche dans le formulaire d'inscription
    combineDateFields('birth_date_day', 'birth_date_month', 'birth_date_year', 'birth_date');
    combineDateFields('hire_date_day', 'hire_date_month', 'hire_date_year', 'hire_date');
});