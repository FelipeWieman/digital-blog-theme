const { registerBlockType } = wp.blocks;
const { RichText, MediaUpload } = wp.blockEditor;
const { Button } = wp.components;

// Block 1: Title, text and image right
registerBlockType('custom/text-image-right-block', {
    title: 'About / Paragraph with image right',
    icon: 'align-right',
    category: 'common',
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2',
        },
        text: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
        image: {
            type: 'string',
            source: 'attribute',
            selector: 'img',
            attribute: 'src',
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const onSelectImage = (media) => {
            setAttributes({ image: media.url });
        };

        return wp.element.createElement(
            'div',
            { className: 'flex-row' },
            wp.element.createElement(
                'div',
                { className: 'text' },
                wp.element.createElement(
                    'div',
                    { className: 'text-underline' },
                    wp.element.createElement(RichText, {
                        tagName: 'h2',
                        value: attributes.title,
                        onChange: (value) => setAttributes({ title: value }),
                        placeholder: 'Type title here...',
                    })
                ),
                wp.element.createElement(RichText, {
                    tagName: 'p',
                    value: attributes.text,
                    onChange: (value) => setAttributes({ text: value }),
                    placeholder: 'Type text here...',
                })
            ),
            wp.element.createElement(
                'div',
                { className: 'image' },
                wp.element.createElement(MediaUpload, {
                    onSelect: onSelectImage,
                    allowedTypes: 'image',
                    value: attributes.image,
                    render: ({ open }) => wp.element.createElement(
                        Button,
                        { onClick: open, isDefault: true, isLarge: true },
                        !attributes.image ? 'Chose image' : wp.element.createElement('img', { src: attributes.image })
                    )
                })
            )
        );
    },
    save: ({ attributes }) => {
        return wp.element.createElement(
            'div',
            { className: 'flex-row' },
            wp.element.createElement(
                'div',
                { className: 'text' },
                wp.element.createElement(
                    'div',
                    { className: 'text-underline' },
                    wp.element.createElement('h2', null, attributes.title)
                ),
                wp.element.createElement('p', null, attributes.text)
            ),
            wp.element.createElement(
                'div',
                { className: 'image' },
                wp.element.createElement('img', { src: attributes.image, alt: 'Image' })
            )
        );
    },
});

// Block 2: Title, text and image left
registerBlockType('custom/text-image-left-block', {
    title: 'About / Paragraph with image LEFT',
    icon: 'align-left',
    category: 'common',
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2',
        },
        text: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
        image: {
            type: 'string',
            source: 'attribute',
            selector: 'img',
            attribute: 'src',
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const onSelectImage = (media) => {
            setAttributes({ image: media.url });
        };

        return wp.element.createElement(
            'div',
            { className: 'flex-row-2' },
            wp.element.createElement(
                'div',
                { className: 'image' },
                wp.element.createElement(MediaUpload, {
                    onSelect: onSelectImage,
                    allowedTypes: 'image',
                    value: attributes.image,
                    render: ({ open }) => wp.element.createElement(
                        Button,
                        { onClick: open, isDefault: true, isLarge: true },
                        !attributes.image ? 'Chose image' : wp.element.createElement('img', { src: attributes.image })
                    )
                })
            ),
            wp.element.createElement(
                'div',
                { className: 'text' },
                wp.element.createElement(
                    'div',
                    { className: 'text-underline' },
                    wp.element.createElement(RichText, {
                        tagName: 'h2',
                        value: attributes.title,
                        onChange: (value) => setAttributes({ title: value }),
                        placeholder: 'Type title here...',
                    })
                ),
                wp.element.createElement(RichText, {
                    tagName: 'p',
                    value: attributes.text,
                    onChange: (value) => setAttributes({ text: value }),
                    placeholder: 'Type text here...',
                })
            )
        );
    },
    save: ({ attributes }) => {
        return wp.element.createElement(
            'div',
            { className: 'flex-row-2' },
            wp.element.createElement(
                'div',
                { className: 'image' },
                wp.element.createElement('img', { src: attributes.image, alt: 'Image' })
            ),
            wp.element.createElement(
                'div',
                { className: 'text' },
                wp.element.createElement(
                    'div',
                    { className: 'text-underline' },
                    wp.element.createElement('h2', null, attributes.title)
                ),
                wp.element.createElement('p', null, attributes.text)
            )
        );
    },
});


// Block 3: Title and text
registerBlockType('custom/text-block', {
    title: 'About / Title with text',
    icon: 'text',
    category: 'common',
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2',
        },
        text: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
        block_class: {
            type: 'string',
            default: 'text_oben',
        },
    },
    edit: ({ attributes, setAttributes }) => {
        return wp.element.createElement(
            'div',
            { className: `text-row ${attributes.block_class}` },
            wp.element.createElement(
                'div',
                { className: 'text-underline' },
                wp.element.createElement(RichText, {
                    tagName: 'h2',
                    value: attributes.title,
                    onChange: (value) => setAttributes({ title: value }),
                    placeholder: 'Type title here...',
                })
            ),
            wp.element.createElement(RichText, {
                tagName: 'p',
                value: attributes.text,
                onChange: (value) => setAttributes({ text: value }),
                placeholder: 'Type text here...',
            })
        );
    },
    save: ({ attributes }) => {
        return wp.element.createElement(
            'div',
            { className: `text-row ${attributes.block_class}` },
            wp.element.createElement(
                'div',
                { className: 'text-underline' },
                wp.element.createElement('h2', null, attributes.title)
            ),
            wp.element.createElement('p', null, attributes.text)
        );
    },
});

// Блок 4: Only text
registerBlockType('custom/text-only-block', {
    title: 'About / Only text',
    icon: 'editor-paragraph',
    category: 'common',
    attributes: {
        text: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
    edit: ({ attributes, setAttributes }) => {
        return wp.element.createElement(
            'div',
            { className: 'text-row' },
            wp.element.createElement(RichText, {
                tagName: 'p',
                value: attributes.text,
                onChange: (value) => setAttributes({ text: value }),
                placeholder: 'Type text here...',
            })
        );
    },
    save: ({ attributes }) => {
        return wp.element.createElement(
            'div',
            { className: 'text-row' },
            wp.element.createElement('p', null, attributes.text)
        );
    },
});