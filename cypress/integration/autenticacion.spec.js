/// <references types="cypress" />

describe('Prueba Autenticacion', () => {

    it('Prueba Autenticacion Login', () => {
        cy.visit('/login');

        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').should('have.text', 'Iniciar Sesión');
        cy.get('[data-cy="formulario-login"]').should('exist');

        //Campos obligatorios
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should('exist');

        cy.get('[data-cy="alerta-login"]').eq(0).should('have.class', 'error');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.text', 'El email es obligatorio');

        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class', 'error');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text', 'El password es obligatorio');

        });
    });