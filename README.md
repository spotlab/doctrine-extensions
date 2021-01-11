# Several Doctrine extensions

**Version 1.0.0**

- Nationalities available for "en" and "fr" locales

## Extensions and Documentation

This package contains extensions that offer new functionalities. List of extensions:

- **Nationality** - this extension allows to create a new "Nationality" field. It gives access to a new assert and form field type. It uses the Intl locale and save data as indexes in the same format.

## Installation

### Download with composer

	composer require spotlab/doctrine-extensions

## Usage

### Ex. Nationality Form Type Integration

In your form:

	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nationality', NationalityType::class, array(
	                'label' => 'user.label.nationality',
	                'required' => true,
	            ))
	            // ...

### Ex. Nationality Validator config

Add in your services.yml:

	spotlab.validator.Nationality:
        class: Spotlab\Validator\Constraints\NationalityValidator
        tags:
            - { name: validator.constraint_validator, alias: NationalityValidator }

### Ex. Nationality Assert usage

In your entity:

	/**
     * @ORM\Column(type="string", length=2)
     * @SpotlabAssert\Nationality()
     */
    protected $nationality;

## License

This code is under MIT license.