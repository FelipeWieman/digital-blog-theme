const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { PanelBody, SelectControl } = wp.components;
const { Fragment } = wp.element;

registerBlockType('custom/text-row-block', {
    title: 'Текстовый блок с заголовком и классом',
    icon: 'editor-textcolor',
    category: 'design',
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2',
        },
        content: {
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
            null,
            wp.element.createElement(
                InspectorControls,
                null,
                wp.element.createElement(
                    PanelBody,
                    { title: 'Настройки блока' },
                    wp.element.createElement(SelectControl, {
                        label: 'Класс блока',
                        value: attributes.block_class,
                        options: [
                            { label: 'Text Oben', value: 'text_oben' },
                            { label: 'Другой класс', value: 'другой_класс' },
                        ],
                        onChange: (block_class) => setAttributes({ block_class }),
                    })
                )
            ),
            wp.element.createElement(
                'div',
                { className: `text-row ${attributes.block_class}` },
                wp.element.createElement(
                    'div',
                    { className: 'text-underline' },
                    wp.element.createElement(RichText, {
                        tagName: 'h2',
                        value: attributes.title,
                        onChange: (value) => setAttributes({ title: value }),
                        placeholder: 'Введите заголовок...',
                    })
                ),
                wp.element.createElement(RichText, {
                    tagName: 'p',
                    value: attributes.content,
                    onChange: (value) => setAttributes({ content: value }),
                    placeholder: 'Введите текст...',
                })
            )
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
            wp.element.createElement(
                'p',
                null,
                attributes.block_class === 'text_oben' &&
                wp.element.createElement(RichText.Content, {
                    value: attributes.content,
                })
            )
        );
    },

});
