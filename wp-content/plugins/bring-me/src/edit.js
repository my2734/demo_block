import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { useEntityRecord } from '@wordpress/core-data';
import { FormTokenField, Placeholder } from '@wordpress/components'
import { useState, useEffect } from 'react'



import './editor.scss';
export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();
	const [selectedContinents, setSelectedContinents] = useState([]);
	const continents = [
		'Africa',
		'America',
		'Antarctica',
		'Asia',
		'Europe',
		'Oceania',
	];

	useEffect(() => {
		setAttributes({
			'list_message': selectedContinents
		})
	}, [selectedContinents])

	console.log(attributes['list_message'])

	return (
		<>
			<Placeholder label='Twich Stream Picker'>
				<FormTokenField
					label='Post to display'
				__experimentalRenderItem={false}
					value={selectedContinents}
					suggestions={continents.map((con) => con)}
					onChange={(tokens) => setSelectedContinents(tokens)}
				/>
			</Placeholder>
		</>
	);
}
