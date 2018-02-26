
#
# Used to convert a QPushButton into a <input> HTML tag with type="button"
# https://www.w3schools.com/tags/tag_input.asp
#
class QPushButton
    alias Properties = Array(NamedTuple(string: String))

    # Instance variables are always private.
    @name = ""
    @value = ""

    def initialize(name : String, properties : Properties)
        @name = name
        @value = properties[1][:string]
    end
    
    def to_s() : String
        return "<input type=\"button\" id=\"" + @name + "\" name=\"" + @name + "\" value=\"" + @value + "\" />\n"
    end
end
