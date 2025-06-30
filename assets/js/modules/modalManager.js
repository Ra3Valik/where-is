export default class ModalManager {
    constructor() {
        this.modals = {};
        this.initEvents();
    }

    initEvents() {
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('[data-modal]');
            if (btn) {
                this.openModal(btn.dataset.modal);
                e.preventDefault();
            }

            if (e.target.closest('.js-modal-close') || e.target.classList.contains('js-modal-backdrop')) {
                this.closeModals();
                e.preventDefault();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') this.closeModals();
        });
    }

    openModal(id) {
        this.closeModals();

        const modal = document.getElementById(id);
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            this.modals[id] = modal;
        }
    }

    closeModals() {
        Object.keys(this.modals).forEach(id => {
            const modal = this.modals[id];
            modal.style.display = 'none';
        });
        document.body.style.overflow = '';
        this.modals = {};
    }
}
