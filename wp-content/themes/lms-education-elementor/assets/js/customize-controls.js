( function( api ) {

	// Extends our custom "lms-education-elementor" section.
	api.sectionConstructor['lms-education-elementor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );