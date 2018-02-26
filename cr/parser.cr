
require "xml"
require "./QPushButton.cr"

#
# Returns an array of all elements with the specified tag name.
#
def find_elements_by_name(parent : XML::Node | Nil, name : String) : Array(XML::Node)
    elements = Array(XML::Node).new()
    return elements if !parent

    parent.children.select(&.element?).each { |child|
        if name == child.name
            elements.push(child)
        end
    }
    return elements
end

def get_widgets(document : XML::Node) : Array(XML::Node)
    elements = Array(XML::Node).new()
    
    return elements if !document   
 
    widgets = find_elements_by_name(document.first_element_child, "widget")
    return elements if !widgets

    return find_elements_by_name(widgets[0], "widget")
end

alias QWidget = QPushButton;

def dispatch_element(type : String, name : String, properties : Array(XML::Node)) : QWidget | Nil
    case type
        when "QPushButton"
            return QPushButton.new(name, properties)
    else
    end
end

#
# ==============================================================================
#

if ARGV.size() == 0
    puts "Invalid arguments"
    exit 1
end

content  = File.read(ARGV[0])
document = XML.parse(content)

elements = get_widgets(document)

elements.each { |element|     
    properties = find_elements_by_name(element, "property")    
    object = dispatch_element(element["class"], element["name"], properties)
    puts object.to_s()
}
