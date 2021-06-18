/// <references types="cypress" />

describe('Prueba navegacion y Routing Header y Footer', () => {

    it('Prueba nav header', () => {
        cy.visit('/');

        cy.get('[data-cy="nav-header"]').should('exist');
        cy.get('[data-cy="nav-header"]').find('a').should('have.length', 5);
        cy.get('[data-cy="nav-header"]').find('a').should('not.have.length', 6);

        //Revisar que los enlaces sean correctos
        cy.get('[data-cy="nav-header"]').find('a').eq(0).invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy="nav-header"]').find('a').eq(0).invoke('text').should('equal', 'Nosotros');

        cy.get('[data-cy="nav-header"]').find('a').eq(1).invoke('attr', 'href').should('equal', '/rutinas');
        cy.get('[data-cy="nav-header"]').find('a').eq(1).invoke('text').should('equal', 'Entrenos');

        cy.get('[data-cy="nav-header"]').find('a').eq(2).invoke('attr', 'href').should('equal', '/nutricion');
        cy.get('[data-cy="nav-header"]').find('a').eq(2).invoke('text').should('equal', 'Nutricion');

        cy.get('[data-cy="nav-header"]').find('a').eq(4).invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="nav-header"]').find('a').eq(4).invoke('text').should('equal', 'Contacto');
        });

    it('Prueba nav footer', () => {

        cy.get('[data-cy="nav-footer"]').should('exist');
        cy.get('[data-cy="nav-footer"]').should('have.prop', 'class').should('equal', 'navegacion');
        cy.get('[data-cy="nav-footer"]').find('a').should('have.length', 5);
        cy.get('[data-cy="nav-footer"]').find('a').should('not.have.length', 6);

        cy.get('[data-cy="nav-footer"]').find('a').eq(0).invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy="nav-footer"]').find('a').eq(0).invoke('text').should('equal', 'Nosotros');

        cy.get('[data-cy="nav-footer"]').find('a').eq(1).invoke('attr', 'href').should('equal', '/rutinas');
        cy.get('[data-cy="nav-footer"]').find('a').eq(1).invoke('text').should('equal', 'Entrenos');

        cy.get('[data-cy="nav-footer"]').find('a').eq(2).invoke('attr', 'href').should('equal', '/nutricion');
        cy.get('[data-cy="nav-footer"]').find('a').eq(2).invoke('text').should('equal', 'Nutricion');

        cy.get('[data-cy="nav-footer"]').find('a').eq(4).invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="nav-footer"]').find('a').eq(4).invoke('text').should('equal', 'Contacto');

        cy.get('[data-cy="copyright"]').should('have.prop', 'class').should('equal', 'copyright');
    });
});