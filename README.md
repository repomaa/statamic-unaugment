# Unaugment

Statamic "augments" field values by default when it serializes them in content
api responses. Unaugment lets you define specific fields or field types that
will be left alone and return the data without any modifications. This is
especially useful for the Bard or Markdown field types. By using the unaugmented
data you mitigate any chance of XSS in your client application.

## Configuration

Unaugment will place a sample config file into `config`. Edit it to define the
fields and/or field types you want to unaugment.

## Copyright

2021 - Joakim Repomaa
