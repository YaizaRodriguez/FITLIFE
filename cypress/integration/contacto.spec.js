/// <references types="cypress" />

describe('Prueba Formulario Contacto', () => {

    it('Prueba Pagina Contacto y Envio Emails', () => {
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Formulario de Contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Rellena el Formulario de Contacto');

        cy.get('[data-cy="formulario-contacto"]').should('exist');

        });

        it('Llena los campos del formulario', () => {
    
            cy.get('[data-cy="input-nombre"]').type('Yaiza');
            cy.get('[data-cy="input-mensaje"]').type('Añadir Rutina');

            cy.get('[data-cy="form-contacto"]').eq(1).check(); 
            cy.wait(3000);
            cy.get('[data-cy="form-contacto"]').eq(0).check(); 

            cy.get('[data-cy="input-telefono"]').type('1235469879');
            cy.get('[data-cy="input-fecha"]').type('2021-06-18');
            cy.get('[data-cy="input-hora"]').type('10:30');


            cy.get('[data-cy="formulario-contacto"]').submit();
            cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
            cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje enviado');
            cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class', 'exito');

            });

});