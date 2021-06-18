/// <references types="cypress" />

describe('Carga pagina principal', () => {
    it('Prueba el header de la pagina principal', () => {
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Consigue tus Objetivos con FitLife');
        
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'FitLife');
    });

    it('Prueba Header', () => {
    
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

        //Iconos
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4);
      
    });

    it('Prueba Rutinas', () => {
    
        //Comprobar que haya 3 rutinas
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 4);

        //Prueba enlace Rutinas
        cy.get('[data-cy="enlace-rutina"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-rutina"]').should('not.have.class', 'boton-amarillo');

        cy.get('[data-cy="enlace-rutina"]').first().invoke('text').should('equal', 'Ver Entrenamiento');

        //Prueba enlace a una rutina/entreno
        cy.get('[data-cy="enlace-rutina"]').first().click();
        cy.get('[data-cy="titulo-rutina"]').should('exist');

        cy.wait(1000);
        cy.go('back');
    });

    it('Prueba Routing hacia Rutinas', () => {
        cy.get('[data-cy="ver-rutinas"]').should('exist');
        cy.get('[data-cy="ver-rutinas"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="ver-rutinas"]').invoke('attr', 'href').should('equal', '/rutinas');
        
        cy.get('[data-cy="ver-rutinas"]').click();
        cy.get('[data-cy="heading-rutinas"]').invoke('text').should('equal', 'Planes de Entrenamiento');

        cy.wait(1000);
        cy.go('back');
    });

    
    it('Prueba Bloque Contacto', () => { 
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Dejanos ayudarte a conseguir tus objetivos');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.');

        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href')
        .then( href => {
            cy.visit(href)
        });

        cy.get('[data-cy="heading-contacto"]').should('exist');

        cy.wait(1000);
        cy.visit('/');
    });

    it('Prueba Nutricion y Testimonial', () => { 
        cy.get('[data-cy="nutricion"]').should('exist');
        cy.get('[data-cy="nutricion"]').find('h3').invoke('text').should('not.equal', 'Nutricion');
        cy.get('[data-cy="nutricion"]').find('img').should('have.length', 2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('not.equal', 'Compartenos tu experiencia');
        
    });



});