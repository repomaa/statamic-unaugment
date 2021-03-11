# Unaugment

Statamic "augments" field values by default when it serializes them in content
api responses. Unaugment lets you define specific fields or field types that
will be left alone and return the data without any modifications. This is
especially useful for the Bard or Markdown field types which are otherwise
rendered into html. By using the unaugmented data you mitigate any chance of XSS
in your client application and are free to structure the dom - or your native app's components - however you want.

## Configuration

Unaugment will place a sample config file into `config`. Edit it to define the
fields and/or field types you want to unaugment.

## Output

Unaugmented Bard field content looks like this:

```json
{
  "data": {
    // ...
    "bard": [
      {
        "content": [
          {
            "text": "Foobar Foo",
            "type": "text"
          },
          {
            "type": "hard_break"
          },
          {
            "type": "hard_break"
          },
          {
            "marks": [
              {
                "type": "bold"
              }
            ],
            "text": "Bold stuff!",
            "type": "text"
          }
        ],
        "type": "paragraph"
      },
      {
        "attrs": {
          "level": 2
        },
        "content": [
          {
            "text": "Header!",
            "type": "text"
          }
        ],
        "type": "heading"
      },
      {
        "content": [
          {
            "marks": [
              {
                "type": "italic"
              }
            ],
            "text": "Cursive",
            "type": "text"
          }
        ],
        "type": "paragraph"
      }
    ]
    // ...
  }
}
```

## Copyright

2021 - Joakim Repomaa
